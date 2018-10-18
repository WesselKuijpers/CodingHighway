<?php

namespace Modules\Course\Tests;

use App\Models\course\Course;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CourseTest extends TestCase
{
  use RefreshDatabase;
  use WithoutMiddleware;

  public function setUp()
  {
    parent::setUp();
    Artisan::call('migrate', ['--env' => 'testing']);
    Artisan::call('db:seed', ['--env' => 'testing']);
  }

  public function testCourseCreate()
  {
    $post = [
      'name' => 'TestCourse',
      'description' => 'iuaehrgihaeriughewiurhgiuawbrgiuaebriuv',
      'color' => '#f0f',
      'media' => null
    ];

    $reponse = $this->post(route('course.store'), $post);

    $course = Course::latest('id')->first();

    if (
      $course->name == $post['name'] &&
      $course->description == $post['description'] &&
      $course->color == $post['color'] &&
      $course->media == $post['media']
    ):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }

  public function testCourseUpdate()
  {
    $course = Course::latest('id')->first();

    $post = [
      '_method' => 'PUT',
      'id' => $course->id,
      'name' => 'TestCourse',
      'description' => 'iuaehrgihaeriughewiurhgiuawbrgiuaebriuv',
      'color' => '#f0f',
      'media' => null
    ];

    $reponse = $this->post(route('course.update', ['id' => $course->id]), $post);

    $course = Course::latest('id')->first();
    if (
      $course->name == $post['name'] &&
      $course->description == $post['description'] &&
      $course->color == $post['color'] &&
      $course->media == $post['media']
    ):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }

  public function CourseDelete()
  {
    $course = Course::latest('id')->first();

    $post = [
      '_method' => 'DELETE',
      'id' => $course->id
    ];

    $response = $this->post(route('course.destroy', ['id'=> $course->id]), $post);
    dd($response);

    $course2 = Course::latest('id')->first();

    if ($course->id != $course2->id):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }
}
