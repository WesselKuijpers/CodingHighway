<?php

use Modules\Course\Entities\Course;
use Modules\Course\Entities\Exercise;
use Modules\Course\Entities\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TestExerciseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Schema::connection('mysql-course')->disableForeignKeyConstraints();
    $html = Course::where('name', 'HTML')->first();
    $css = Course::where('name', 'CSS')->first();
    $js = Course::where('name', 'JS')->first();

    $beginner = Level::where('name', 'Beginner')->first();
    $expert = Level::where('name', 'Expert')->first();

    // HTML course
    if (Exercise::where('title', 'Oefening1-html')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 1;
      $exercise->title = 'Oefening1-html';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $html->id;
      $exercise->level_id = $beginner->id;
      $exercise->is_first = true;
      $exercise->is_final = rand(0, 1);
      $exercise->next_id = 2;
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening2-html')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 2;
      $exercise->title = 'Oefening2-html';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $html->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 3;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening3-html')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 3;
      $exercise->title = 'Oefening3-html';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $html->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 4;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening4-html')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 4;
      $exercise->title = 'Oefening4-html';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $html->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 5;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening11-html')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 5;
      $exercise->title = 'Oefening11-html';
      $exercise->content = Faker\Provider\Lorem::text(600);
      $exercise->course_id = $html->id;
      $exercise->level_id = $expert->id;
      $exercise->next_id = null;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    // CSS course
    if (Exercise::where('title', 'Oefening1-css')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 6;
      $exercise->title = 'Oefening1-css';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $css->id;
      $exercise->level_id = $beginner->id;
      $exercise->is_first = true;
      $exercise->next_id = 7;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening2-css')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 7;
      $exercise->title = 'Oefening2-css';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $css->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 8;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening3-css')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 8;
      $exercise->title = 'Oefening3-css';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $css->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 9;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening4-css')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 9;
      $exercise->title = 'Oefening4-css';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $css->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 10;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening11-css')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 10;
      $exercise->title = 'Oefening11-css';
      $exercise->content = Faker\Provider\Lorem::text(600);
      $exercise->course_id = $css->id;
      $exercise->level_id = $expert->id;
      $exercise->next_id = null;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    // JS course
    if (Exercise::where('title', 'Oefening1-js')->count() == 0):
      $exercise = new Exercise;
      $exercise->title = 'Oefening1-js';
      $exercise->id = 11;
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $js->id;
      $exercise->level_id = $beginner->id;
      $exercise->is_first = true;
      $exercise->next_id = 12;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening2-js')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 12;
      $exercise->title = 'Oefening2-js';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $js->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 13;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening3-js')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 13;
      $exercise->title = 'Oefening3-js';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $js->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 14;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening4-js')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 14;
      $exercise->title = 'Oefening4-js';
      $exercise->content = Faker\Provider\Lorem::text(500);
      $exercise->course_id = $js->id;
      $exercise->level_id = $beginner->id;
      $exercise->next_id = 15;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;

    if (Exercise::where('title', 'Oefening11-js')->count() == 0):
      $exercise = new Exercise;
      $exercise->id = 15;
      $exercise->title = 'Oefening11-js';
      $exercise->content = Faker\Provider\Lorem::text(600);
      $exercise->course_id = $js->id;
      $exercise->level_id = $expert->id;
      $exercise->next_id = null;
      $exercise->is_final = rand(0, 1);
      $exercise->save();
    endif;
    Schema::connection('mysql-course')->enableForeignKeyConstraints();
  }
}
