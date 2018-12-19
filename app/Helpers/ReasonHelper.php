<?php

use Modules\Blipd\Entities\LessonCard;
use Modules\Blipd\Entities\ExerciseCard;
use Modules\Blipd\Http\Requests\ReasonRequest;

class ReasonHelper
{
    public static function create(ReasonRequest $request)
    {
        DB::beginTransaction();

        $validated = $request->validated();
        $saved = true;

        if(!empty($validated['lessons'])):
            foreach($validated['lessons'] as $id => $reason):
                $lessonCard = LessonCard::find($id);
                $lessonCard->reason = $reason;

                if($lessonCard->save()):
                    $saved = true;
                else:
                    $saved = false;
                    break;
                endif;
            endforeach;
        endif;

        if(!empty($validated['exercises'])):
            foreach($validated['exercises'] as $id => $reason):
                $exerciseCard = ExerciseCard::find($id);
                $exerciseCard->reason = $reason;

                if($exerciseCard->save()):
                    $saved = true;
                else:
                    $saved = false;
                    break;
                endif;
            endforeach;
        endif;

        if($saved):
            DB::commit();
            return true;
        else:
            DB::rollback();
            // TODO: change to dynamic flashmessage
            return redirect()->back()->with('error', "er is iets fout gegaan bij het opslaan van je redenen");
        endif;
    }
}
