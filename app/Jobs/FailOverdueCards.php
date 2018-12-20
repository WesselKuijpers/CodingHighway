<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Blipd\Entities\LessonCard;
use Modules\Blipd\Entities\ExerciseCard;
use Modules\Blipd\Entities\State;
use Modules\Blipd\Entities\Planning;
use Carbon\Carbon;
use OverdueCardHelper;

class FailOverdueCards implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get the required states; these are always the same because thay are seeded
        $f = State::where('name', 'F')->first();
        $d = State::where('name', 'D')->first();

        // get all the plannings that should be finished
        $plannings = Planning::where('finished', '<=', Carbon::now())->get();
        
        // for every one of those plannings;
        foreach($plannings as $planning):
            // get the unfinished, unfailed tasks;
            $lessonCards = $planning->lessons->where('state_id', '!=', $f->id)->where('state_id', '!=', $d->id);
            $exerciseCards = $planning->exercises->where('state_id', '!=', $f->id)->where('state_id', '!=', $d->id);

            // fail them.
            OverdueCardHelper::FailCards($lessonCards);
            OverdueCardHelper::FailCards($exerciseCards);
        endforeach;
    }
}
