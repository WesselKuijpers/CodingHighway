<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\ApiProgressReqeust;
use Modules\Course\Entities\Exercise;
use Modules\Course\Entities\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProgressController extends Controller
{
  public function load(ApiProgressReqeust $reqeust)
  {
    $data = $reqeust->validated();

    $user = User::find($data['user_id']);

    if($data['lessons']):
      $progress = $user->progress($data['course_id'])->where('lesson_id', "!=", null)->count();
      $max = Lesson::where('course_id', $data['course_id'])->count();

      return '{"progress":'.$progress.',"max":'.$max.'}';
    elseif($data['exercises']):
      $progress = $user->progress($data['course_id'])->where('exercise_id', "!=", null)->count();
      $max = Exercise::where('course_id', $data['course_id'])->count();

      return '{"progress":'.$progress.',"max":'.$max.'}';
    else:
      return '{"message":"BAD"}';
    endif;
  }
}
