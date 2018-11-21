<?php

namespace App\Http\Controllers\api;

use App\Models\course\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartExamController extends Controller
{
  public function load(Request $request)
  {
    $course = Course::find($request->course_id);

    $questions = $course->startExam->questions->load('answers');

    return json_encode($questions);

  }
}
