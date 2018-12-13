<?php

namespace Modules\Blipd\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blipd\Entities\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (State::where('name', 'BL')->count() != 1):
            $state = new State;
            $state->name = "BL";
            $state->level = 1;
            $state->save();
          endif;
      
          if (State::where('name', 'IP')->count() != 1):
            $state = new State;
            $state->name = "IP";
            $state->level = 2;
            $state->save();
          endif;
      
          if (State::where('name', 'D')->count() != 1):
            $state = new State;
            $state->name = "D";
            $state->level = 3;
            $state->save();
          endif;
      
          if (State::where('name', 'F')->count() != 1):
            $state = new State;
            $state->name = "F";
            $state->level = 3;
            $state->save();
          endif;
    }
}
