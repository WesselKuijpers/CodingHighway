<?php

use Modules\Blipd\Entities\State;
use Illuminate\Support\Facades\DB;

class OverdueCardHelper 
{
    public static function FailCards($cards)
    {
        // begin transaction
        DB::beginTransaction();

        // variable to detirmine if each and every save was executed correctly
        $saved = true;

        // get the required failed state, this is always the same because we seed the database this way
        $f = State::where('name', 'F')->first();

        // for every card;
        foreach($cards as $card):
            // fail it.
            $card->state_id = $f->id;

            // if the card could be saved, continue else fail.
            if($card->save()):
                $saved = true;
            else:
                $saved = false;
                break;
            endif;
        endforeach;

        // commit the transaction if everything went down smoothly, else rollback.
        if($saved):
            DB::commit();
            return true;
        else:
            DB::rollback();
            return false;
        endif;
    }
}
