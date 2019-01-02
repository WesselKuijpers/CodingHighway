<?php

use Illuminate\Database\Seeder;
use Modules\Blipd\Database\Seeders\StateTableSeeder;
use Modules\Forum\Database\Seeders\ForumDatabaseSeeder;

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

        $this->call(LevelSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TestLessonSeeder::class);
        $this->call(TestExerciseSeeder::class);

        $this->call(TestUserSeeder::class);
        $this->call(TestUserProgressSeeder::class);
        $this->call(UserLicensesSeeder::class);

        $this->call(StartExamSeeder::class);
        $this->call(SolutionSeeder::class);

        $this->call(ForumDatabaseSeeder::class);
        $this->call(StateTableSeeder::class);
        Schema::enableForeignKeyConstraints();
        break;
      case 'demo':
        Schema::disableForeignKeyConstraints();
        $this->call(PermissionsAndRoleSeeder::class);
        $this->call(FlashMessagesSeeder::class);

        $this->call(LicensesSeeder::class);
        $this->call(LevelSeeder::class);

        $this->call(DemoUserSeeder::class);

        $this->call(CoursesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);

        $this->call(StartExamsTableSeeder::class);
        $this->call(StartExamQuestionsTableSeeder::class);
        $this->call(StartExamAnswersTableSeeder::class);

        $this->call(MediaTableSeeder::class);
        $this->call(LessonMediaTableSeeder::class);
        $this->call(ExerciseMediaTableSeeder::class);

        $this->call(OrganisationsTableSeeder::class);

        $this->call(ForumDatabaseSeeder::class);
        Schema::enableForeignKeyConstraints();
        break;
      default:
        $this->call(PermissionsAndRoleSeeder::class);
        $this->call(FlashMessagesSeeder::class);

        $this->call(LicensesSeeder::class);
        $this->call(OrganisationsSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserLicensesSeeder::class);

        Schema::disableForeignKeyConstraints();
        $this->call(LevelSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TestLessonSeeder::class);
        $this->call(TestExerciseSeeder::class);
        Schema::enableForeignKeyConstraints();

        $this->call(StateTableSeeder::class);

        $this->call(ForumDatabaseSeeder::class);
        break;
    endswitch;
    }
}
