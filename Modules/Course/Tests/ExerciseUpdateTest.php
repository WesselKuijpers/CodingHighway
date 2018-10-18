<?php

namespace Modules\Course\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleWare;
use Illuminate\Support\Facades\Artisan;
use app\Models\course\Course;
use app\Models\course\Exercise;


class ExerciseUpdateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate', ['--env' => 'testing']);
        Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function SecondToFirst()
    {
        $course = Course::first();
        $first = $course->firstExercise->first();
        $second = $first->next;

        $post = [
            '_method' => 'PUT',
            'id' => $second->id,
            'course_id' => $course->id,
            'title' => $second->title,
            'content' => $second->content,
            'is_final' => 0,
            'is_first' => 1,
            'next_id' => null,
            'level_id' => $second->level_id 
        ];

        $response = $this->put(route('exercise.update', ['course_id' => $course->id, 'id' => $second->id]), $post);
        dd($response);

        $course = Course::first();
        $newFirst = Exercise::where('course_id', $course->id)->where('is_first', 1)->first();
        $newSecond = $newFirst->next;

        if ($newFirst->id == $second->id && $newSecond->id == $first->id):
            if ($newSecond->next_id == $second->next_id && $newFirst->next_id == $newSecond->id):
                $this->assertTrue(true);
            else:
                $this->assertTrue(false);
            endif;
        else:
            $this->assertTrue(false);
        endif;
    }

    public function RandomToFirst()
    {
        # code...
    }

    public function SwitchAdjacent()
    {
        # code...
    }

    public function RandomBecomesLast()
    {
        # code...
    }

    public function LastBecomesFirst()
    {
        # code...
    }
}
