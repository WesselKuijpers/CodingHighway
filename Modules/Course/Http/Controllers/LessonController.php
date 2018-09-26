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
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    return view('course::lesson.index');
  }

  /**
   * Show the form for creating a new resource.
   * @param $id
   * @return Response
   */
  public function create($id)
  {
    $course = Course::find($id);
    $levels = Level::all();
    return view('course::lesson.create', ['course' => $course, 'levels' => $levels]);
  }

  /**
   * Store a newly created resource in storage.
   * @param $id
   * @param LessonRequest|Request $request
   * @return Response
   */
  public function store($id, LessonRequest $request)
  {
    if ($id != $request['course_id']) {
      return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
    } else {
      $data = LessonHelper::create($request);

      if ($data != false):
        return redirect('/course/' . $id);
      else :
        return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
      endif;
    }
  }

  /**
   * Show the specified resource.
   * @return Response
   */
  public function show()
  {
    return view('course::lesson/show');
  }

  /**
   * Show the form for editing the specified resource.
   * @return Response
   */
  public function edit($courseId, $lessonId)
  {
    $course = Course::find($courseId);
    $lesson = Lesson::find($lessonId);
    $levels = Level::all();

    return view('course::lesson/edit', ['course' => $course, 'lesson' => $lesson, 'levels' => $levels]);
  }

  /**
   * Update the specified resource in storage.
   * @param $course_id
   * @param  Request $request
   * @return Response
   * @internal param $id
   */
  public function update($id, $lesson, LessonRequest $request)
  {
    if ($lesson != $request['course_id']) {
      return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
    } else {
        $data = LessonHelper::edit($request);
        if ($data != false):
            return redirect('/course/' . $id);
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
