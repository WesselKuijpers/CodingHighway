<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\ExerciseRequest;
use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Lesson;
use App\Models\course\Level;
use ExerciseHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ExerciseController extends Controller
{
  public function __construct()
  {
    $this->middleware('LicenseCheck')->only(['index','show']);
    $this->middleware('permission:exercise.show')->only(['index','show']);
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
      $exercises = $course->exercises;
      return view('course::exercise.index', ['course' => $course, 'exercises' => $exercises]);
    }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function create($id)
    {
        // finds the course by the ID param, fetches all the levels from the DB and gives it to the view
        $course = Course::find($id);
        $levels = Level::all();
        return view('course::exercise.create', ['course' => $course, 'levels' => $levels]);
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
        if ($id != $request['course_id'])
        {
            return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
        }
        else
        {
            // attempts to create the exercise via the ExerciseHelper, passing in the request.
            $data = ExerciseHelper::create($request);

            // if successful redirect to specific course overview, else redirect back with status
            if ($data != false):
                return redirect()->route('course.show', ['id' => $id]);
            else :
                return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
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

        // pass them to the view
        return view('course::exercise.edit', ['course' => $course, 'exercise' => $exercise, 'levels' => $levels]);
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
        if ($id != $request['course_id'])
        {
            return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
        }
        else
        {
            // attempts to update the exercise via the ExerciseHelper, passing in the request.
            $data = ExerciseHelper::edit($request);

            // if successful redirect to specific course overview, else redirect back with status
            if ($data != false):
                return redirect()->route('course.show', ['id' => $id]);
            else :
                return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
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
