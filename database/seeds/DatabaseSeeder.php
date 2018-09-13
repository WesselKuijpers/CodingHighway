<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(RoleAndPermissionSeeder::class);
    $this->call(UserTableSeeder::class);

    $this->call(LevelSeeder::class);
    $this->call(CourseSeeder::class);
    $this->call(LessonSeeder::class);
    $this->call(ExerciseSeeder::class);

    $this->call(ForumSeeder::class);
  }
}
