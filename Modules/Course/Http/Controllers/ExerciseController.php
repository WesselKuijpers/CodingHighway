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
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('course::exercise/index');
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
        return view('course::exercise/create', ['course' => $course, 'levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     * @param $id
     * @param ExerciseRequest|Request $request
     * @return Response
     */
    public function store($id, ExerciseRequest $request)
    {
        if ($id != $request['course_id'])
        {
            return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
        }
        else
        {
            $data = ExerciseHelper::create($request);

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
        return view('course::exercise/show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($courseId, $excerciseId)
    {
        $course = Course::find($courseId);
        $exercise = Exercise::find($excerciseId);
        $levels = Level::all();

        return view('course::exercise/edit', ['course' => $course, 'exercise' => $exercise, 'levels' => $levels]);
    }

    /**
     * Update the specified resource in storage.
     * @param $course_id
     * @param  Request $request
     * @return Response
     * @internal param $id
     */
    public function update($id, $exercise, ExerciseRequest $request)
    {
        if ($id != $request['course_id'])
        {
            return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
        }
        else
        {
            $data = ExerciseHelper::edit($request);

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
