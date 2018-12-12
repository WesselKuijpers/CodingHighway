<?php

namespace App\Http\Controllers\api;

use Modules\Course\Entities\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ResultHelper;

class StartExamController extends Controller
{
  public function load(Request $request)
  {
    $course = Course::find($request->course_id);

    $questions = $course->startExam->questions->load('answers');

    return json_encode($questions);

  }

  public function result(Request $request)
  {
    $data = ResultHelper::result($request);
    return 'ok!';
  }
}
