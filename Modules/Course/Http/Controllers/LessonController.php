<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\course\Course;
use App\Models\course\Lesson;
use App\Models\course\Level;
use App\Models\general\FlashMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use LessonHelper;
use OrderHelper;
use OrderUpdateHelper;

class LessonController extends Controller
{
  public function __construct()
  {
    $this->middleware('LicenseCheck')->only(['index', 'show']);
    $this->middleware('permission:lesson.show')->only(['index', 'show']);
    $this->middleware('permission:lesson.create')->only(['create', 'store']);
    $this->middleware('permission:lesson.edit')->only(['edit', 'update']);
    $this->middleware('permission:lesson.delete')->only(['destroy']);
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index($id)
  {
    $course = Course::find($id);
    $lessons = OrderHelper::sortList($course->lessons);
    return view('course::lesson.index', ['course' => $course, 'lessons' => $lessons]);
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function create($id)
  {
    //fetches the course by id in params, fetches all levels and other lessons and pass them to the view.
    $course = Course::find($id);
    $levels = Level::all();

    $lessons = OrderHelper::SortList($course->lessons);
    return view('course::lesson.create', ['course' => $course, 'levels' => $levels, 'lessons' => $lessons]);
  }

  /**
   * @param $id
   * @param LessonRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store($id, LessonRequest $request)
  {
     // dd($_POST);
    // evaluates if the ID param is the same as the id that was passed in by the request.
    // if false redirect with errors, if true continue
    if ($id != $request['course_id']) {
      return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
    } else {
      $course = Course::find($id);
      $first = $course->firstLesson;
      $last = $course->lessons->where('next_id', null)->first();
      // attempts to create the lesson via the LessonHelper, passing in the request.
      $data = LessonHelper::create($request);

      // if $data is true redirect to specific course overview, else redirect back with errors
      if ($data instanceof RedirectResponse):
        return $data;
      else:

        if (!empty($request['is_first']) && !empty($first)):
          $changedFirst = OrderHelper::SwitchFirst($first, $data);
        else:
          $changedFirst = false;
        endif;

        if ($request->next_id != 0 && $changedFirst == false):
          $old = Lesson::where('next_id', $data->next_id)->first();
          OrderHelper::SwitchList($old, $data);
        else:
          if (empty($request->is_first)):
            OrderHelper::InsertLast($last, $data);
          endif;
        endif;

        return redirect()->route('course.show', ['id' => $id])->with('msg', FlashMessage::where('name', 'lesson.created')->first()->message);;
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
    $lesson = Lesson::find($id);
    return view('course::lesson.show', ['lesson' => $lesson]);
  }

  /**
   * @param $courseId
   * @param $lessonId
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function edit($courseId, $lessonId)
  {
    // fetches course and lesson from their ids in the params, fetches all levels
    $course = Course::find($courseId);
    $lesson = Lesson::find($lessonId);
    $levels = Level::all();
    $lessons = OrderHelper::SortList($course->lessons);

    // passes them to the view
    return view('course::lesson.edit', ['course' => $course, 'lesson' => $lesson, 'levels' => $levels, 'lessons' => $lessons]);
  }

  /**
   * @param $id
   * @param $lesson
   * @param LessonRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update($id, $lesson, Lessonrequest $request)
  {
    DB::beginTransaction();
    // evaluates if the ID param is the same as the id that was passed in by the request.
    // if false redirect with errors, if true continue
    if ($id != $request['course_id']) {
      return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
    } else {
      $course = Course::find($id);
      $first = $course->firstLesson;
      $last = $course->lessons->where('next_id', null)->first();
      $next_id = Lesson::find($lesson)->next_id;
      $previous = Lesson::where('next_id', $lesson)->first();
      $request_next_previous = Lesson::where('next_id', $request->next_id)->first();
      $alreadyFirst = Lesson::find($lesson)->is_first;

      // attempts to update the Lesson via the LessonHelper, passing in the request.
      $data = LessonHelper::update($request);

      // if successful redirect to specific course overview, else redirect back with status
      if ($data instanceof RedirectResponse):
        return $data;
      else:
        $bool = true;
        if (!$alreadyFirst):
          if (!empty($request->next_id) && $request->next_id != $next_id || $request->is_first):
            if ($course->lessons->count() > 1):
              $bool = OrderUpdateHelper::Check($data, $next_id, $request->next_id, $first, $last, $previous, $request_next_previous);
            endif;
          endif;
        endif;

        if ($bool):
          DB::commit();
          return redirect()->route('course.show', ['id' => $id]);
        else:
          DB::rollback();
          return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
        endif;
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
