<?php

namespace Modules\Course\Tests;

use Modules\Course\Entities\Course;
use Modules\Course\Entities\Lesson;
use Modules\Course\Entities\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LessonCreateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate', ['--env' => 'testing']);
        Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function testNewLessonToFirst()
    {
        $course = Course::first()->id;
        $level = Level::first()->id;

        $post = [
            'title' => 'TestLesson',
            'content' => 'eognwrgoignowngoergnoerngoenowgonteoeoerngoijejnweiomjerjnergwio',
            'course_id' => $course,
            'level_id' => $level,
            'is_first' => true,
            'next_id' => 0,
        ];

        $response = $this->post(route('lesson.store', ['id' => $course]), $post);

        $new = Lesson::latest('id')->where('course_id', $course)->first();

        $is_false = false;
        if ($new->is_first == 1):
            $old = Lesson::find($new->next_id);
            if ($new->next_id == $old->id && $old->is_first == 0):
                $is_false = true;
            endif;
        endif;

        $this->assertTrue($is_false);
    }

    public function testNewLessonToLast()
    {
        $course = Course::first()->id;
        $level = Level::first()->id;
        $is_false = false;

        $post = [
            'title' => 'TestLesson2',
            'content' => 'eognwrgoignowngoergnoerngoenowgonteoeoerngoijejnweiomjerjnergwio',
            'course_id' => $course,
            'level_id' => $level,
            'is_first' => false,
            'next_id' => 0,
        ];

        $response = $this->post(route('lesson.store', ['id' => $course]), $post);

        $new = Lesson::latest('id')->where('course_id', $course)->first();
        $old = Lesson::where('next_id', $new->id)->first();
        if ($old->next_id == $new->id && $new->next_id == null):
            $is_false = true;
        endif;

        $this->assertTrue($is_false);
    }

    public function testNewLessonToRandom()
    {
        $course = Course::first()->id;
        $level = Level::first()->id;
        $is_false = false;
        
        $post = [
            'title' => 'TestLesson3',
            'content' => 'eognwrgoignowngoergnoerngoenowgonteoeoerngoijejnweiomjerjnergwio',
            'course_id' => $course,
            'level_id' => $level,
            'is_first' => false,
            'next_id' => 3,
        ];

        $response = $this->post(route('lesson.store', ['id' => $course]), $post);

        $new = Lesson::latest('id')->where('course_id', $course)->first();

        $up = Lesson::where('next_id', $new->id)->first();
        $down = Lesson::find($new->next_id);

        if ($up->next_id == $new->id && $new->next_id == $down->id):
            $is_false = true;
        endif;

        $this->assertTrue($is_false);
    }
}
