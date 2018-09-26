<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\course\Course;
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
        $data = CourseHelper::create($request);

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
        $data = CourseHelper::edit($request);

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
