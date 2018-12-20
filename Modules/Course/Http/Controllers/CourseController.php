<?php

namespace Modules\Course\Http\Controllers;

use Modules\Course\Http\Requests\CourseRequest;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\Result;
use CourseHelper;
use Illuminate\Http\RedirectResponse;
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
    $courses = Course::where('organisation_id', null)->orWhere('organisation_id', Auth::user()->organisation()->id)->get();
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
      return redirect()->route('course')->with('msg', FlashMessageLoad('course.created'));
    endif;
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function show($id)
  {
    $course = Course::find($id);

    if($course->organisation_id != null && $course->organisation_id != Auth::user()->organisation()->id):
      return redirect()->route('course')->with('error', 'Deze cursus is privé');
    endif;
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

    if($course->organisation_id != null && $course->organisation_id != Auth::user()->organisation()->id):
      return redirect()->route('course')->with('error', 'Deze cursus is privé');
    endif;

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
      return redirect()->route('course')->with('msg', FlashMessageLoad('course.updated'));
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
