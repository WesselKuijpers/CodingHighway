<?php

use Modules\Blipd\Entities\State;
use Illuminate\Support\Facades\DB;

class OverdueCardHelper 
{
    public static function FailCards($cards)
    {
        DB::beginTransaction();

        $saved = true;

        $f = State::where('name', 'F')->first();

        foreach($cards as $card):
            $card->state_id = $f->id;
            if($card->save()):
                $saved = true;
            else:
                $saved = false;
                break;
            endif;
        endforeach;

        if($saved):
            DB::commit();
            return true;
        else:
            DB::rollback();
            return false;
        endif;
    }
}
