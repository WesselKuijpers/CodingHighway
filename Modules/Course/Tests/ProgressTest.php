<?php

namespace Modules\Course\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Course\Entities\Course;
use App\UserProgress;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleWare;
use Illuminate\Support\Facades\Artisan;

class ProgressTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate', ['--env' => 'testing']);
        Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function testExerciseProgressCreate()
    {
        $user = User::first();
        $course = Course::first();
        $exercise = $course->firstExercise->first();

        $post = [
            'user_id' => $user->id,
            'course_id' => $course->id,
            'exercise_id' => $exercise->id
        ];

        $response = $this->actingAs($user)->post(route('progress.create'), $post);

        $response->assertRedirect(route('exercise.show', ['course_id' => $course->id, 'id' => $exercise->next->id]));

        $newExercise = UserProgress::where([
            ['user_id', '=', $user->id],
            ['course_id', '=', $course->id],
            ['exercise_id', '=', $exercise->id]
        ])->first();

        if (!empty($newExercise)):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    public function testLessonProgressCreate()
    {
        $user = User::first();
        $course = Course::first();
        $lesson = $course->firstLesson->first();

        $post = [
            'user_id' => $user->id,
            'course_id' => $course->id,
            'lesson_id' => $lesson->id
        ];

        $response = $this->actingAs($user)->post(route('progress.create'), $post);

        $response->assertRedirect(route('lesson.show', ['course_id' => $course->id, 'id' => $lesson->next->id]));

        $newLesson = UserProgress::where([
            ['user_id', '=', $user->id],
            ['course_id', '=', $course->id],
            ['lesson_id', '=', $lesson->id]
        ])->first();

        if (!empty($newLesson)):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    public function testResetProgress()
    {
        $user = User::find(1);
        $course = Course::where('name', 'HTML')->first();

        $post = [
            'user_id' => $user->id,
            'course_id' => $course->id
        ];

        $response = $this->actingAs($user)->post(route('progress.reset'), $post);

        $progresses = UserProgress::where('user_id', $user->id)->where('course_id', $course->id)->get();

        if (count($progresses) == 0):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }
}
