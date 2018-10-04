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
    $this->call(PermissionSeeder::class);
    $this->call(RoleSeeder::class);

    $this->call(SaPermissionSeeder::class);
    $this->call(AdminPermissionSeeder::class);
    $this->call(UserPermissionSeeder::class);

    $this->call(LicensesSeeder::class);
    $this->call(OrganisationsSeeder::class);
    $this->call(UserTableSeeder::class);
    $this->call(UserOrganisationLicensesSeeder::class);

    $this->call(LevelSeeder::class);
    $this->call(CourseSeeder::class);
    $this->call(LessonSeeder::class);
    $this->call(ExerciseSeeder::class);

    $this->call(ForumSeeder::class);
  }
}
