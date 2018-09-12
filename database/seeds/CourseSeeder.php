<?php

use App\Models\course\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    if (Course::where('name', 'HTML')->count() != 1):
      $course = new Course;
      $course->name = "HTML";
      $course->description = Faker\Provider\Lorem::text(300);
      $course->color = Faker\Provider\Color::hexColor();
      $course->media_id = null;
      $course->save();
    endif;

    if (Course::where('name', 'CSS')->count() != 1):
      $course = new Course;
      $course->name = "CSS";
      $course->description = Faker\Provider\Lorem::text(300);
      $course->color = Faker\Provider\Color::hexColor();
      $course->media_id = null;
      $course->save();
    endif;

    if (Course::where('name', 'JS')->count() != 1):
      $course = new Course;
      $course->name = "JS";
      $course->description = Faker\Provider\Lorem::text(300);
      $course->color = Faker\Provider\Color::hexColor();
      $course->media_id = null;
      $course->save();
    endif;
  }
}
