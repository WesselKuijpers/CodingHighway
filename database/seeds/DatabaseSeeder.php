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
    if (env('APP_ENV') == 'testing'):
      Schema::disableForeignKeyConstraints();
      $this->call(OrganisationsSeeder::class);
      $this->call(LicensesSeeder::class);
      $this->call(PermissionSeeder::class);
      $this->call(RoleSeeder::class);

      $this->call(SaPermissionSeeder::class);
      $this->call(AdminPermissionSeeder::class);
      $this->call(UserPermissionSeeder::class);

      $this->call(LicensesSeeder::class);
      $this->call(LevelSeeder::class);
      $this->call(CourseSeeder::class);
      $this->call(TestLessonSeeder::class);
      $this->call(TestExerciseSeeder::class);
      $this->call(TestUserSeeder::class);
      $this->call(TestUserProgressSeeder::class);
      Schema::enableForeignKeyConstraints();
    else:
      $this->call(PermissionSeeder::class);
      $this->call(RoleSeeder::class);

      $this->call(SaPermissionSeeder::class);
      $this->call(AdminPermissionSeeder::class);
      $this->call(UserPermissionSeeder::class);

      $this->call(LicensesSeeder::class);
      $this->call(OrganisationsSeeder::class);
      $this->call(UserTableSeeder::class);
      $this->call(UserOrganisationLicensesSeeder::class);

      Schema::disableForeignKeyConstraints();
      $this->call(LevelSeeder::class);
      $this->call(CourseSeeder::class);
      $this->call(TestLessonSeeder::class);
      $this->call(TestExerciseSeeder::class);
      Schema::enableForeignKeyConstraints();

      $this->call(ForumSeeder::class);
    endif;
  }
}
