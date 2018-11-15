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
    switch (env('APP_ENV')):
      case 'testing':
        Schema::disableForeignKeyConstraints();
        $this->call(PermissionsAndRoleSeeder::class);
        $this->call(FlashMessagesSeeder::class);

        $this->call(LicensesSeeder::class);
        $this->call(OrganisationsSeeder::class);

        $this->call(LicensesSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TestLessonSeeder::class);
        $this->call(TestExerciseSeeder::class);
        $this->call(TestUserSeeder::class);
        $this->call(TestUserProgressSeeder::class);
        Schema::enableForeignKeyConstraints();
        break;
      case 'demo':
        $this->call(PermissionsAndRoleSeeder::class);
        $this->call(FlashMessagesSeeder::class);

        $this->call(LicensesSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(OrganisationsSeeder::class);

        $this->call(DemoUserSeeder::class);
        break;
      default:
        $this->call(PermissionsAndRoleSeeder::class);
        $this->call(FlashMessagesSeeder::class);

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
        break;
    endswitch;
  }
}
