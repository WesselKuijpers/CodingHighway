<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\course\Course;
use App\Models\course\Level;
use App\Http\Requests\StartExamRequest;
use StartExamHelper;

class StartExamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($courseId)
    {
        return view('course::startexam.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($courseId)
    {
        $course = Course::find($courseId);
        return view('course::startexam.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store($courseId, StartExamRequest $request)
    {
        $data = StartExamHelper::create($request);

        if($data == false):
            return redirect()->back()->with('error', FlashMessage::where('name', 'lesson.create.error')->first()->message);
        else:
            return redirect()->route('course.show', ['id' => $courseId]);
        endif;
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($courseId, $id)
    {
        $course = Course::find($courseId);
        return view('course::startexam.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($courseId, $id)
    {
        $exam = StartExam::find($id);
        return view('course::startexam.edit', ['startExam' => $exam]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($courseId, $id, StartExamRequest $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($courseId, $id)
    {
    }
}
