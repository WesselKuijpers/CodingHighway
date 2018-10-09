<?php

use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Level;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for($i=0;$i < 10; $i++):
      $exercise = new Exercise;
      $exercise->title = Faker\Provider\Lorem::text('10');
      $exercise->course_id = Course::inRandomOrder()->first()->id;
      $exercise->content = Faker\Provider\Lorem::text(500);
      $final = rand(0,1);
      $exercise->is_final = $final;
      $exercise->level_id = Level::inRandomOrder()->first()->id;
      $exercise->save();
    endfor;
  }
}
