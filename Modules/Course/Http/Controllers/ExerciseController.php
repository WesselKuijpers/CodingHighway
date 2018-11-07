<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\ExerciseRequest;
use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Lesson;
use App\Models\course\Level;
use ExerciseHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use OrderHelper;
use OrderUpdateHelper;

class ExerciseController extends Controller
{
  public function __construct()
  {
    $this->middleware('LicenseCheck')->only(['index', 'show']);
    $this->middleware('permission:exercise.show')->only(['index', 'show']);
    $this->middleware('permission:exercise.create')->only(['create', 'store']);
    $this->middleware('permission:exercise.edit')->only(['edit', 'update']);
    $this->middleware('permission:exercise.delete')->only(['destroy']);
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index($id)
  {
    $course = Course::find($id);
    $exercises = OrderHelper::sortList($course->exercises);
    return view('course::exercise.index', ['course' => $course, 'exercises' => $exercises]);
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function create($id)
  {
    // finds the course by the ID param, fetches all the levels and exercises from the DB and gives it to the view
    $course = Course::find($id);
    $levels = Level::all();
    $exercises = OrderHelper::SortList($course->exercises);
    return view('course::exercise.create', ['course' => $course, 'levels' => $levels, 'exercises' => $exercises]);
  }

  /**
   * @param $id
   * @param ExerciseRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store($id, ExerciseRequest $request)
  {
    // evaluates if the ID param is the same as the id that was passed in by the request.
    // if false redirect with errors, if true continue
    if ($id != $request['course_id']) {
      return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
    } else {
      $course = Course::find($id);
      $first = $course->firstExercise;
      $last = $course->exercises->where('next_id', null)->first();
      // attempts to create the exercise via the ExerciseHelper, passing in the request.
      $data = ExerciseHelper::create($request);

      // if successful redirect to specific course overview, else redirect back with status
      if ($data instanceof RedirectResponse):
        return $data;
      else:
        if (!empty($request['is_first']) && !empty($first)):
          $changedFirst = OrderHelper::SwitchFirst($first, $data);
        else:
          $changedFirst = false;
        endif;

        if ($request->next_id != 0 && $changedFirst == false):
          $old = Exercise::where('next_id', $data->next_id)->first();
          OrderHelper::SwitchList($old, $data);
        else:
          if (empty($request->is_first)):
            OrderHelper::InsertLast($last, $data);
          endif;
        endif;

        return redirect()->route('course.show', ['id' => $id]);
      endif;
    }
  }

  /**
   * @param $courseId
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function show($courseId, $id)
  {
    $exercise = Exercise::find($id);
    return view('course::exercise.show', ['exercise' => $exercise]);
  }

  /**
   * @param $courseId
   * @param $excerciseId
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function edit($courseId, $excerciseId)
  {
    // fetches course and exercise from the passed in params, fetch all levels
    $course = Course::find($courseId);
    $exercise = Exercise::find($excerciseId);
    $levels = Level::all();
    $exercises = OrderHelper::SortList($course->exercises);

    // pass them to the view
    return view('course::exercise.edit', ['course' => $course, 'exercise' => $exercise, 'levels' => $levels, 'exercises' => $exercises]);
  }

  /**
   * @param $id
   * @param $exercise
   * @param ExerciseRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update($id, $exercise, ExerciseRequest $request)
  {
    // evaluates if the ID param is the same as the id that was passed in by the request.
    // if false redirect with errors, if true continue
    if ($id != $request['course_id']) {
      return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
    } else {
      $course = Course::find($id);
      $first = $course->firstExercise;
      $last = $course->exercises->where('next_id', null)->first();
      $next_id = Exercise::find($exercise)->next_id;
      $previous = Exercise::where('next_id', $exercise)->first();
      $request_next_previous = Exercise::where('next_id', $request->next_id)->first();

      // attempts to update the exercise via the ExerciseHelper, passing in the request.
      $data = ExerciseHelper::update($request);

      // if successful redirect to specific course overview, else redirect back with status
      if ($data != false):
        if ($request->next_id != $next_id || $request->is_first):
          if ($course->exercises->count() > 1):
            OrderUpdateHelper::Check($data, $next_id, $request->next_id, $first, $last, $previous, $request_next_previous);
          endif;
        endif;

        return redirect()->route('course.show', ['id' => $id]);
      else :
        return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
      endif;
    }
  }

  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function destroy()
  {
  }
}
