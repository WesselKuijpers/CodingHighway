<?php

namespace Modules\Course\Tests;

use app\Models\course\Course;
use app\Models\course\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleWare;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LessonUpdateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate', ['--env' => 'testing']);
        Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function testSecondToFirst()
    {
        $course = Course::first();
        $first = $course->firstLesson->first();
        $second = $first->next;

        $post = [
            '_method' => 'PUT',
            'id' => $second->id,
            'course_id' => $course->id,
            'title' => $second->title,
            'content' => $second->content,
            'is_first' => 1,
            'next_id' => null,
            'level_id' => $second->level_id,
        ];

        $response = $this->put(route('lesson.update', ['course_id' => $course->id, 'id' => $second->id]), $post);

        $course = Course::first();
        $newFirst = Lesson::where('course_id', $course->id)->where('is_first', 1)->first();
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

    public function testRandomToFirst()
    {
        $course = Course::first();
        $first = $course->firstLesson->first();
        $rand = $course->lessons->find(4);
        $oldPrev = Lesson::where('next_id', $rand->id)->first();

        $post = [
            '_method' => 'PUT',
            'id' => $rand->id,
            'course_id' => $course->id,
            'title' => $rand->title,
            'content' => $rand->content,
            'is_first' => 1,
            'next_id' => $first->id,
            'level_id' => $rand->level_id,
        ];

        $response = $this->put(route('lesson.update', ['course_id' => $course->id, 'id' => $rand->id]), $post);

        $course = Course::first();
        $newFirst = Lesson::where('course_id', $course->id)->where('is_first', 1)->first(); // newfirst = rand
        $newSecond = $newFirst->next;
        $newPrev = Lesson::find($oldPrev->id);

        if (
            $newFirst->id == $rand->id &&
            $newSecond->id == $first->id &&
            $newFirst->next_id == $newSecond->id &&
            $oldPrev->next_id != $newPrev->next_id &&
            $newPrev->next_id == $rand->next_id
        ):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    public function testSwitchAdjacent()
    {
        $course = Course::first();
        $rand = $course->lessons->find(3);
        $prev = $course->lessons->where('next_id', $rand->id)->first();
        $next = $rand->next_id;
        $requestNextPrevious = $course->lessons->where('next_id', $prev->id)->first();

        $post = [
            '_method' => 'PUT',
            'id' => $rand->id,
            'course_id' => $course->id,
            'title' => $rand->title,
            'content' => $rand->content,
            'is_first' => 0,
            'next_id' => $prev->id,
            'level_id' => $rand->level_id,
        ];

        $response = $this->put(route('lesson.update', ['course_id' => $course->id, 'id' => $rand->id]), $post);

        $course = Course::first();
        $newRand = $course->lessons->find(3);
        $newPrev = $course->lessons->find(2);
        $newRequestNextPrevious = $course->lessons->find(1);
        $newNext = $course->lessons->find(4);

        if ($newRequestNextPrevious->next_id == $newRand->id && $newRand->next_id == $newPrev->id && $newPrev->next_id == $newNext->id):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    public function testRandomBecomesLast()
    {
        $course = Course::first();
        $rand = $course->lessons->find(3);
        $last = $course->lessons->where('next_id', null)->first();
        $prev = $course->lessons->where('next_id', $rand->id)->first();

        $post = [
            '_method' => 'PUT',
            'id' => $rand->id,
            'course_id' => $course->id,
            'title' => $rand->title,
            'content' => $rand->content,
            'is_first' => 0,
            'next_id' => null,
            'level_id' => $rand->level_id,
        ];

        $response = $this->put(route('lesson.update', ['course_id' => $course->id, 'id' => $rand->id]), $post);

        $course = Course::first();
        $newRand = $course->lessons->find(3);
        $newLast = $course->lessons->find(5);
        $newPrev = $course->lessons->find(2);

        if ($newLast->next_id != null && $newLast->next_id == $newRand->id && $newRand->next_id == null && $newPrev->next_id == $rand->next_id):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    public function testLastBecomesFirst()
    {
        $course = Course::first();
        $first = $course->firstLesson->first();
        $last = $course->lessons->where('next_id', null)->first();
        $prev = $course->lessons->where('next_id', $last->id)->first();

        $post = [
            '_method' => 'PUT',
            'id' => $last->id,
            'course_id' => $course->id,
            'title' => $last->title,
            'content' => $last->content,
            'is_first' => 1,
            'next_id' => null,
            'level_id' => $last->level_id,
        ];

        $response = $this->put(route('lesson.update', ['course_id' => $course->id, 'id' => $last->id]), $post);

        $course = Course::first();
        $newFirst = $course->lessons->find(1);
        $newLast = $course->lessons->find(5);
        $newPrev = $course->lessons->find(4);

        if ($newPrev->next_id == null && $newLast->next_id == $newFirst->id && $newLast->is_first && !$newFirst->is_first):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }
}
