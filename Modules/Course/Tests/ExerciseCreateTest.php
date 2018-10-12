<?php

namespace Modules\Course\Tests;

use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ExerciseCreateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate', ['--env' => 'testing']);
        Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function testNewExerciseToFirst()
    {
        $course = Course::first()->id;
        $level = Level::first()->id;

        $post = [
            'title' => 'TestExercise',
            'content' => 'eognwrgoignowngoergnoerngoenowgonteoeoerngoijejnweiomjerjnergwio',
            'course_id' => $course,
            'level_id' => $level,
            'is_first' => true,
            'is_final' => false,
            'next_id' => 0,
        ];

        $response = $this->post(route('exercise.store', ['id' => $course]), $post);

        $new = Exercise::latest('id')->where('course_id', $course)->first();

        $is_false = false;
        if ($new->is_first == 1):
            $old = Exercise::find($new->next_id);
            if ($new->next_id == $old->id && $old->is_first == 0):
                $is_false = true;
            endif;
        endif;

        $this->assertTrue($is_false);
    }

    public function testNewExerciseToLast()
    {
        $course = Course::first()->id;
        $level = Level::first()->id;
        $is_false = false;

        $post = [
            'title' => 'TestExercise2',
            'content' => 'eognwrgoignowngoergnoerngoenowgonteoeoerngoijejnweiomjerjnergwio',
            'course_id' => $course,
            'level_id' => $level,
            'is_first' => false,
            'is_final' => false,
            'next_id' => 0,
        ];

        $response = $this->post(route('exercise.store', ['id' => $course]), $post);

        $new = Exercise::latest('id')->where('course_id', $course)->first();
        $old = Exercise::where('next_id', $new->id)->first();
        if ($old->next_id == $new->id && $new->next_id == null):
            $is_false = true;
        endif;

        $this->assertTrue($is_false);
    }

    public function testNewExerciseToRandom()
    {
        $course = Course::first()->id;
        $level = Level::first()->id;
        $is_false = false;
        
        $post = [
            'title' => 'TestExercise3',
            'content' => 'eognwrgoignowngoergnoerngoenowgonteoeoerngoijejnweiomjerjnergwio',
            'course_id' => $course,
            'level_id' => $level,
            'is_first' => false,
            'is_final' => false,
            'next_id' => 3,
        ];

        $response = $this->post(route('exercise.store', ['id' => $course]), $post);

        $new = Exercise::latest('id')->where('course_id', $course)->first();

        $up = Exercise::where('next_id', $new->id)->first();
        $down = Exercise::find($new->next_id);

        if ($up->next_id == $new->id && $new->next_id == $down->id):
            $is_false = true;
        endif;

        $this->assertTrue($is_false);
    }
}

