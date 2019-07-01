<?php

use Modules\Course\Entities\Level;
use Modules\Course\Entities\Result;
use Modules\Course\Entities\StartExamQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\UserProgress;

class ResultHelper
{
  public static function result(Request $request)
  {
    $correct = 0;

    foreach ($request->answers as $q => $a):
      if ($q != 'course_id'):
        $question = StartExamQuestion::find($q);
        if ($a == $question->correct_answer_id):
          $correct++;
        endif;
      endif;
    endforeach;

    $percentage = $correct / count($request->answers) * 100;

    if ($percentage < 55):
      $level = Level::where('name', 'Beginner')->first();
    elseif ($percentage < 80):
      $level = Level::where('name', 'Gemiddeld')->first();
    elseif ($percentage > 80):
      $level = Level::where('name', 'Expert')->first();
    endif;

    $result = new Result;
    $result->user_id = Auth::id();
    $result->level_id = $level->id;
    $result->course_id = $request->course_id;

    $lowerLevel = Level::where('degree', '<', $level->degree)->get();

//    foreach ($lowerLevel as $level):
//      foreach ($level->lessons()->where('course_id', $request->course_id)->get() as $lesson):
//        $progress = new UserProgress;
//        $progress->user_id = Auth::id();
//        $progress->course_id = $lesson->course_id;
//        $progress->lesson_id = $lesson->id;
//        $progress->save();
//      endforeach;
//    endforeach;

    if ($result->save()):
      return redirect()->route('course.show', ['id' => $request->course_id]);
    else:
      return redirect()->back();
    endif;
  }
}
