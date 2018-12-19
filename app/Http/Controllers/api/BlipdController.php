<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blipd\Entities\LessonCard;
use Modules\Blipd\Entities\ExerciseCard;
use Modules\Blipd\Entities\Planning;

class BlipdController extends Controller
{
    public function lessonUpdate(Request $request)
    {
        $card = LessonCard::find(str_replace('lcard', '', $request->lesson_id));
        if($card->planning->user_id == $request->user()->id):
            $card->state_id = str_replace('lstate', '', $request->state_id);
        else:
            return "bad";
        endif;

        if($card->save()):
            return $request->lesson_id;
        else:
            return "bad";
        endif;
    }
    
    public function ExerciseUpdate(Request $request)
    {
        $card = ExerciseCard::find(str_replace('ecard', '', $request->exercise_id));
        if($card->planning->user_id == $request->user()->id):
            $card->state_id = str_replace('estate', '', $request->state_id);
        else:
            return "bad";
        endif;

        if($card->save()):
            return $request->exercise_id;
        else:
            return "bad";
        endif;
    }

    public function GetPlanning(Request $request)
    {
        $plannings = Planning::where('user_id', $request->user_id)->with('lessons.lesson.course', 'lessons.state')->with('exercises.exercise.course', 'exercises.state')->orderBy('created_at', 'desc')->get();

        return $plannings;
    }
}
