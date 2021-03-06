<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blipd\Entities\LessonCard;
use Modules\Blipd\Entities\ExerciseCard;
use Modules\Blipd\Entities\Planning;
use Modules\Blipd\Entities\State;
use App\User;

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

    public function getPie(Request $request)
    {   
        $user = User::find($request->user_id);

        $f = State::where('name', 'F')->first();
        $d = State::where('name', 'D')->first();
        $ip = State::where('name', 'IP')->first();
        $bl = State::where('name', 'BL')->first();
        $total = 0;
        $doneCards = 0;
        $failedCards = 0;
        $unfinishedCards = 0;
        $backlog = 0;

        $plannings;

        if(!empty($request->planning_id)):
            $plannings = $user->plannings->where('id', $request->planning_id);
        else:
            if (empty($request->limit)):
                $plannings = $user->plannings;
            else:
                $plannings = $user->plannings()->where('id', '!=', $user->plannings()->latest('id')->first()->id)->latest('id')->limit($request->limit)->orderBy('created_at', 'desc')->get();
            endif;
        endif;

        if(!empty($plannings)):
            foreach($plannings as $planning):
                foreach($planning->lessons as $lesson):
                    if($lesson->state_id == $d->id):
                        $doneCards++;
                        $total++;
                    endif;
                    if($lesson->state_id == $f->id):
                        $failedCards++;
                        $total++;
                    endif;
                    if($lesson->state_id == $ip->id):
                        $unfinishedCards++;
                        $total++;
                    endif;
                    if($lesson->state_id == $bl->id):
                        $backlog++;
                        $total++;
                    endif;
                endforeach;
                foreach($planning->exercises as $exercise):
                    if($exercise->state_id == $d->id):
                        $doneCards++;
                        $total++;
                    endif;
                    if($exercise->state_id == $f->id):
                        $failedCards++;
                        $total++;
                    endif;
                    if($exercise->state_id == $ip->id):
                        $unfinishedCards++;
                        $total++;
                    endif;
                    if($exercise->state_id == $bl->id):
                        $backlog++;
                        $total++;
                    endif;
                endforeach;
            endforeach;
        endif;

        return ["total" => $total, "done" => $doneCards, "failed" => $failedCards, "in_progress" => $unfinishedCards, 'backlog' => $backlog];
    }

    public function getBar(Request $request)
    {   
        $user = User::find($request->user_id);

        $f = State::where('name', 'F')->first();
        $d = State::where('name', 'D')->first();
        $ip = State::where('name', 'IP')->first();
        $bl = State::where('name', 'BL')->first();
        
        $plannings = $user->plannings()->where('id', '!=', $user->plannings()->latest('id')->first()->id)->latest('id')->limit($request->limit)->orderBy('id')->get();

        $bar_data = [];

        foreach ($plannings as $planning):
            $data = [
                        'time' => \Carbon\Carbon::parse($planning->created_at, 'UTC')->format('d F Y') . " - " . \Carbon\Carbon::parse($planning->finished, 'UTC')->format('d F Y'),
                        'failed' => 0,
                        'succeeded' => 0
                    ];
            
            foreach($planning->exercises as $exercise):
                if($exercise->state_id == $d->id):
                    $data['succeeded']++;
                else:
                    $data['failed']++;
                endif;
            endforeach;

            foreach($planning->lessons as $lesson):
                if($lesson->state_id == $d->id):
                    $data['succeeded']++;
                else:
                    $data['failed']++;
                endif;
            endforeach;

            array_push($bar_data, $data);
        endforeach;

        return $bar_data;
    }
}
