<?php

use App\Models\course\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Level::where('name', 'Beginner')->count() != 1):
          $level = new Level;
          $level->name = 'Beginner';
          $level->save();
        endif;

        if (Level::where('name', 'Expert')->count() != 1):
          $level = new Level;
          $level->name = 'Expert';
          $level->save();
        endif;

        if (Level::where('name', 'Gemiddeld')->count() != 1):
          $level = new Level;
          $level->name = 'Gemiddeld';
          $level->save();
        endif;
    }
}
