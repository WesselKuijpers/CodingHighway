<?php
use Modules\Blipd\Http\Requests\PlanningRequest;
use Modules\Blipd\Entities\Planning;
use Modules\Blipd\Entities\LessonCard;
use Modules\Blipd\Entities\ExerciseCard;
use Modules\Blipd\Entities\State;
use Carbon\Carbon;

class PlanningHelper
{
    public static function create(PlanningRequest $request)
    {
        $saved = null;

        $validated = $request->validated();

        $planning = new Planning;
        $planning->user_id = Auth::id();
        $planning->finished = Carbon::now()->addDays(7);
        if($planning->save()):
            $saved = true;
        else:
            // TODO: change to dynamic flashmessage
            return redirect()->back()->with('error', 'Er is iets fout gegaan tijdens het opslaan van je planning');
        endif;

        $blstate = State::where('name', 'BL')->first();

        foreach($validated['lessons'] as $lessonId):
            $lesson = new LessonCard;
            $lesson->planning_id = $planning->id;
            $lesson->lesson_id = $lessonId;
            $lesson->state_id = $blstate->id;

            if($lesson->save()):
                $saved = true;
            else:
                $saved = false;
                break;
            endif;
        endforeach;

        $saved;

        foreach($validated['exercises'] as $exerciseId):
            $exercise = new ExerciseCard;
            $exercise->planning_id = $planning->id;
            $exercise->exercise_id = $exerciseId;
            $exercise->state_id = $blstate->id;
            
            if($exercise->save()):
                $saved = true;
            else:
                $saved = false;
                break;
            endif;
        endforeach;

        if($saved):
            return $planning;
        else:
            // TODO: change to dynamic flashmessage
            return redirect()->back()->with('error', "er is iets fout gegaan bij het opslaan van je planning");
        endif;
    }
}
