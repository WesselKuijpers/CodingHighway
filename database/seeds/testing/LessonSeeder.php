<?php

use App\Models\course\Course;
use App\Models\course\Lesson;
use App\Models\course\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TestLessonSeeder extends Seeder
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
    if (Lesson::where('title', 'Les1-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 1;
      $lesson->title = 'Les1-html';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $html->id;
      $lesson->level_id = $beginner->id;
      $lesson->is_first = true;
      $lesson->next_id = 2;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les2-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 2;
      $lesson->title = 'Les2-html';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $html->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 3;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les3-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 3;
      $lesson->title = 'Les3-html';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $html->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 4;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les4-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 4;
      $lesson->title = 'Les4-html';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $html->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 5;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les11-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 5;
      $lesson->title = 'Les11-html';
      $lesson->content = Faker\Provider\Lorem::text(600);
      $lesson->course_id = $html->id;
      $lesson->level_id = $expert->id;
      $lesson->next_id = null;
      $lesson->save();
    endif;

    // CSS course
    if (Lesson::where('title', 'Les1-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 6;
      $lesson->title = 'Les1-css';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $css->id;
      $lesson->level_id = $beginner->id;
      $lesson->is_first = true;
      $lesson->next_id = 7;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les2-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 7;
      $lesson->title = 'Les2-css';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $css->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 8;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les3-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 8;
      $lesson->title = 'Les3-css';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $css->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 9;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les4-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 9;
      $lesson->title = 'Les4-css';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $css->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 10;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les11-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 10;
      $lesson->title = 'Les11-css';
      $lesson->content = Faker\Provider\Lorem::text(600);
      $lesson->course_id = $css->id;
      $lesson->level_id = $expert->id;
      $lesson->next_id = null;
      $lesson->save();
    endif;

    // JS course
    if (Lesson::where('title', 'Les1-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les1-js';
      $lesson->id = 11;
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $js->id;
      $lesson->level_id = $beginner->id;
      $lesson->is_first = true;
      $lesson->next_id = 12;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les2-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 12;
      $lesson->title = 'Les2-js';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $js->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 13;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les3-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 13;
      $lesson->title = 'Les3-js';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $js->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 14;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les4-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 14;
      $lesson->title = 'Les4-js';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $js->id;
      $lesson->level_id = $beginner->id;
      $lesson->next_id = 15;
      $lesson->save();
    endif;

    if (Lesson::where('title', 'Les11-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->id = 15;
      $lesson->title = 'Les11-js';
      $lesson->content = Faker\Provider\Lorem::text(600);
      $lesson->course_id = $js->id;
      $lesson->level_id = $expert->id;
      $lesson->next_id = null;
      $lesson->save();
    endif;
    Schema::connection('mysql-course')->enableForeignKeyConstraints();
  }
}
