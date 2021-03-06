<?php

use Modules\Course\Entities\Level;
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
      $level->degree = 1;
      $level->save();
    endif;

    if (Level::where('name', 'Gemiddeld')->count() != 1):
      $level = new Level;
      $level->name = 'Gemiddeld';
      $level->degree = 2;
      $level->save();
    endif;

    if (Level::where('name', 'Expert')->count() != 1):
      $level = new Level;
      $level->name = 'Expert';
      $level->degree = 3;
      $level->save();
    endif;
  }
}
