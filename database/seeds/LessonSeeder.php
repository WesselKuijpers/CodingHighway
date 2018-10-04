<?php

use App\Models\course\Course;
use App\Models\course\Lesson;
use App\Models\course\Level;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
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

    if (Lesson::where('title', 'Les1-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les1-html';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $html->id;
      $lesson->level_id = $beginner->id;
    endif;
    if (Lesson::where('title', 'Les11-html')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les11-html';
      $lesson->content = Faker\Provider\Lorem::text(600);
      $lesson->course_id = $html->id;
      $lesson->level_id = $expert->id;
    endif;

    if (Lesson::where('title', 'Les1-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les1-css';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $css->id;
      $lesson->level_id = $beginner->id;
    endif;
    if (Lesson::where('title', 'Les11-css')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les11-css';
      $lesson->content = Faker\Provider\Lorem::text(600);
      $lesson->course_id = $css->id;
      $lesson->level_id = $expert->id;
    endif;

    if (Lesson::where('title', 'Les1-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les1-js';
      $lesson->content = Faker\Provider\Lorem::text(500);
      $lesson->course_id = $js->id;
      $lesson->level_id = $beginner->id;
    endif;
    if (Lesson::where('title', 'Les11-js')->count() == 0):
      $lesson = new Lesson;
      $lesson->title = 'Les11-js';
      $lesson->content = Faker\Provider\Lorem::text(600);
      $lesson->course_id = $js->id;
      $lesson->level_id = $expert->id;
    endif;
  }
}
