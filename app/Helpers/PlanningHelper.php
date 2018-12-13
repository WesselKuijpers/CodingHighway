<?php
use Modules\Blipd\Http\Requests\PlanningRequest;
use Modules\Blipd\Entities\Planning;
use Modules\Blipd\Entities\LessonCard;
use Modules\Blipd\Entities\ExerciseCard;
use Carbon\Carbon;

class PlanningHelper
{
    public static function create(PlanningRequest $request)
    {
        $validated = $request->validated();

        $planning = new Planning;
        $planning->user_id = Auth::id();
        $planning->finished = Carbon::now()->addDays(7);
        $planning->save();

        foreach($validated['lessons'] as $lesson):
            $lesson = new LessonCard;
            $lesson->planning = $planning->id;
            $lesson->lesson_id = $lesson;
        endforeach;
    }
}
