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
        if ($data != false):
            return redirect()->route('course');
        else :
            return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
        endif;
    }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function show($id)
    {
      $course = Course::find($id);

      return view('course::course.show', ['course' => $course]);
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
        // TODO: add id to $request so that request can be submitted.
        // TODO: display request errors.
        // $data variable attempts to update a course via the course helper, if successful return true, else return false.
        $data = CourseHelper::edit($request);

        // if $data is true return to course overview else redirect back with errors
        if ($data != false):
            return redirect()->route('course');
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
