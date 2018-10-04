<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\course\Course;
use App\Models\course\Lesson;
use App\Models\course\Level;
use FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use LessonHelper;

class LessonController extends Controller
{
  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index($id)
  {
    $course = Course::find($id);
    $lessons = $course->lessons;
    return view('course::lesson.index', ['course' => $course, 'lessons' => $lessons]);
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function create($id)
  {
    //fetches the course by id in params, fetches all levels and pass them to the view.
    $course = Course::find($id);
    $levels = Level::all();
    return view('course::lesson.create', ['course' => $course, 'levels' => $levels]);
  }

  /**
   * @param $id
   * @param LessonRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store($id, LessonRequest $request)
  {
    // evaluates if the ID param is the same as the id that was passed in by the request.
    // if false redirect with errors, if true continue
    if ($id != $request['course_id']) {
      return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
    } else {
      // attempts to create the lessonn via the LessonHelper, passing in the request.
      $data = LessonHelper::create($request);

      // if $data is true redirect to specific course overview, else redirect back with errors
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

    // passes them to the view
    return view('course::lesson.edit', ['course' => $course, 'lesson' => $lesson, 'levels' => $levels]);
  }

  /**
   * @param $id
   * @param $lesson
   * @param LessonRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update($id, $lesson, LessonRequest $request)
  {
    // evaluates if the ID param is the same as the id that was passed in by the request.
    // if false redirect with errors, if true continue
    if ($lesson != $request['course_id']) {
      return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
    } else {
      // attempts to update the lesson via the lesson helper
      $data = LessonHelper::edit($request);

      //if successful redirect so specific course, else redirect with errors.
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
