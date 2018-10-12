<?php

namespace Modules\Course\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\ImpersonatesUsers;
use App\Models\course\Course;
use App\Models\course\Level;

class OrderTest extends TestCase
{
    private $user;

    public function setUp()
    {
        Parent::setUp();
        $this->user = User::where('email', 'test@test.nl')->first();
        Auth::login($this->user);
        $this->be($this->user);
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
            'next_id' => 0
          ];

          $response = $this->actingAs($this->user)->post(route('lesson.store', ['id' => $course]), $post);

          dd($response);
    }
    
    public function testNewLessonToLast()
    {
        # code...
    }

    public function testNewLessonToRandom()
    {
        # code...
    }
}
