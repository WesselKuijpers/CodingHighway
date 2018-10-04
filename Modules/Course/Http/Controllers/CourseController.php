<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Lesson;
use CourseHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CourseController extends Controller
{
  public function __construct()
  {
    $this->middleware('LicenseCheck')->only(['index','show']);
    $this->middleware('role:sa')->except(['index','show']);
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    return view('course::course/index');
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    return view('course::course/create');
  }

  /**
   * Store a newly created resource in storage.
   * @param  Request $request
   * @return Response
   */
  public function store(CourseRequest $request)
  {
    // $data variable attempts to create a course via the course helper, if successful return true, else return false.
    $data = CourseHelper::create($request);

    // if $data is true redirect to the course overview, else redirect back with an error.
    if ($data != false):
      return redirect('/course/');
    else :
      return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
    endif;
  }

  /**
   * Show the specified resource.
   * @return Response
   */
  public function show()
  {
    return view('course::course/show');
  }

  /**
   * Show the form for editing the specified resource.
   * @return Response
   */
  public function edit($id)
  {
    // finds course by ID param and gives it to the view.
    $course = Course::find($id);
    return view('course::course/edit', ['course' => $course]);
  }

  /**
   * Update the specified resource in storage.
   * @param  Request $request
   * @param $id
   * @return Response
   */
  public function update(CourseRequest $request)
  {
    // $data variable attempts to update a course via the course helper, if successful return true, else return false.
    $data = CourseHelper::edit($request);

    // if $data is true return to course overview else redirect back with errors
    if ($data != false):
      return redirect('/course/');
    else :
      return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
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
