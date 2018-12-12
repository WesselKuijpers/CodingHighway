<?php

use Illuminate\Database\Seeder;
use App\UserProgress;
use Modules\Course\Entities\Course;
use App\User;

class TestUserProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::where('name', 'HTML')->first();
        $user = User::find(1);

        foreach ($course->lessons as $lesson):
            $userProgress = new UserProgress;
            $userProgress->user_id = $user->id;
            $userProgress->course_id = $course->id;
            $userProgress->lesson_id = $lesson->id;
            $userProgress->save();
        endforeach;

        foreach ($course->exercises as $exercise):
            $userProgress = new UserProgress;
            $userProgress->user_id = $user->id;
            $userProgress->course_id = $course->id;
            $userProgress->lesson_id = $exercise->id;
            $userProgress->save();
        endforeach;
    }
}
