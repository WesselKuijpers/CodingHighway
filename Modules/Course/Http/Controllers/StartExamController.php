<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\StartExam;
use Modules\Course\Http\Requests\StartExamRequest;
use StartExamHelper;

//TODO Change to flash messages
class StartExamController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:course.show')->only(['index','show']);
      $this->middleware('permission:course.create')->only(['create', 'store']);
      $this->middleware('permission:course.edit')->only(['edit', 'update']);
      $this->middleware('permission:course.delete')->only(['destroy']);
    }
    
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
        $data = StartExamHelper::Create($request);

        if($data == false):
            return redirect()->back()->with('error', 'Er is wat mis gegaan bij het aanmaken van de starttoets!');
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
        $data = StartExamHelper::Update($request);

        if($data == false):
            return redirect()->back()->with('error', 'Er is wat mis gegaan bij het aanpassen van de starttoets!');
        else:
            return redirect()->route('course.show', ['id' => $courseId]);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($courseId, $id, StartExamRequest $request)
    {
        $data = StartExamHelper::Delete($request);

        if($data == false):
            return redirect()->back()->with('error', 'Er is wat mis gegaan bij het verwijderen van de starttoets!');
        else:
            return redirect()->route('course.show', ['id' => $courseId]);
        endif;

    }
}
