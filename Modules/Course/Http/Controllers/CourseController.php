<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Lesson;
use App\Models\course\Result;
use App\Models\general\FlashMessage;
use CourseHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use OrderHelper;

class CourseController extends Controller
{
  public function __construct()
  {
    $this->middleware('LicenseCheck')->only(['index','show']);
    $this->middleware('permission:course.show')->only(['index','show']);
    $this->middleware('permission:course.create')->only(['create', 'store']);
    $this->middleware('permission:course.edit')->only(['edit', 'update']);
    $this->middleware('permission:course.delete')->only(['destroy']);
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    $courses = Course::all();
    return view('course::course.index', ['courses' => $courses]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    return view('course::course.create');
    
  }

  /**
   * @param CourseRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store(CourseRequest $request)
  {
    // $data variable attempts to create a course via the course helper, if successful return true, else return false.
    $data = CourseHelper::create($request);

    // if $data is true redirect to the course overview, else redirect back with an error.
    if ($data instanceof RedirectResponse):
      return $data;
    else :
      return redirect()->route('course')->with('msg', FlashMessage::where('name', 'course.created')->first()->message);
    endif;
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function show($id)
  {
    $course = Course::find($id);
    $startResult = Result::where('user_id', Auth::id())->where('course_id', $course->id)->get();

    $exercises = $course->exercises;
    if(count($exercises) != 0):
      $exercises = OrderHelper::sortList($exercises);
    endif;

    $lessons = $course->lessons;
    if(count($lessons) != 0):
      $lessons = OrderHelper::sortList($lessons);
    endif;

    return view('course::course.show', compact('course', 'exercises', 'lessons', 'startResult'));
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function edit($id)
  {
    // finds course by ID param and gives it to the view.
    $course = Course::find($id);
    return view('course::course.edit', ['course' => $course]);
  }

  /**
   * @param CourseRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update(CourseRequest $request)
  {
    // $data variable attempts to update a course via the course helper, if successful return true, else return false.
    $data = CourseHelper::update($request);

    if ($data instanceof RedirectResponse):
      return $data;
    else :
      return redirect()->route('course')->with('msg', FlashMessage::where('name', 'course.updated')->first()->message);
    endif;
  }

  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function destroy()
  {
  }
}
