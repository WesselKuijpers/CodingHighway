<?php

use App\Models\course\Course;
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
    $html = Course::where('name', 'HTML')->first();
    $css = Course::where('name', 'CSS')->first();
    $js = Course::where('name', 'JS')->first();

    $beginner = Level::where('name', 'Beginner')->first();
    $expert = Level::where('name', 'Expert')->first();

    if (Exercise::where('title', 'Exercise1-html')->count != 0):
      $exercise = new Exercise;
      $exercise->title = 'Exercise1-html';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $html->id;
      $exercise->level_id = $beginner->id;
    endif;
    if (Exercise::where('title', 'Exercise11-html')->count != 0):
      $exercise = new Exercise;
      $exercise->title = 'Exercise11-html';
      $exercise->content = Faker\Provider\Lorem::text(600);
      $exercise->course_id = $html->id;
      $exercise->level_id = $expert->id;
    endif;

    if (Exercise::where('title', 'Exercise1-css')->count != 0):
      $exercise = new Exercise;
      $exercise->title = 'Exercise1-css';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $css->id;
      $exercise->level_id = $beginner->id;
    endif;
    if (Exercise::where('title', 'Exercise11-css')->count != 0):
      $exercise = new Exercise;
      $exercise->title = 'Exercise11-css';
      $exercise->content = Faker\Provider\Lorem::text(600);
      $exercise->course_id = $css->id;
      $exercise->level_id = $expert->id;
    endif;

    if (Exercise::where('title', 'Exercise1-js')->count != 0):
      $exercise = new Exercise;
      $exercise->title = 'Exercise1-js';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $js->id;
      $exercise->level_id = $beginner->id;
    endif;
    if (Exercise::where('title', 'Exercise11-js')->count != 0):
      $exercise = new Exercise;
      $exercise->title = 'Exercise11-js';
      $exercise->content = Faker\Provider\Lorem::text(600);
      $exercise->course_id = $js->id;
      $exercise->level_id = $expert->id;
    endif;
    
  }
}
