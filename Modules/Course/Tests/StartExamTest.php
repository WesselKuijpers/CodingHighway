<?php

namespace Modules\Course\Tests;

use Modules\Course\Entities\Course;
use Modules\Course\Entities\StartExam;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StartExamTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
      parent::setUp();
      Artisan::call('migrate', ['--env' => 'testing']);
      Artisan::call('db:seed', ['--env' => 'testing']);
    }

    /**
     * @group StartExam
     */
    public function testCreateStartExam()
    {
        $course = Course::latest('id')->first();

        $post = [
            'course_id' => $course->id,
            'questions' => [
                0 => [
                    'content' => 'Question 1',
                    'correct' => 'correct answer',
                    'inCorrect' => [
                        0 => 'incorrect answer', 
                        1 => 'incorrect answer', 
                        2 => 'incorrect answer'
                    ]
                ],
                1 => [
                    'content' => 'Question 2',
                    'correct' => 'correct answer',
                    'inCorrect' => [
                        0 => 'incorrect answer', 
                        1 => 'incorrect answer', 
                        2 => 'incorrect answer'
                    ]
                ],
                2 => [
                    'content' => 'Question 3',
                    'correct' => 'correct answer',
                    'inCorrect' => [
                        0 => 'incorrect answer', 
                        1 => 'incorrect answer', 
                        2 => 'incorrect answer'
                    ]
                ]
            ]
          ];
    
        $response = $this->post(route('startExam.store', ['course_id' => $course->id]), $post);

        $startExam = $course->startExam;

        if($startExam != null && $startExam->questions->count() == 3):
            foreach($startExam->questions as $question):
                if($question->answers->count() == 4):
                    $this->assertTrue(true);
                else:
                    $this->assertTrue(false);
                    break;
                endif;
            endforeach;
        else:
            $this->assertTrue(false);
        endif;
    }

    /**
     * @group StartExam
     */
    public function testStartExamDelete()
    {
        $course = $course = Course::where('name', 'HTML')->first();

        $startExam = $course->startExam;

        $post = [
            '_method' => 'DELETE',
            'id' => $startExam->id
        ];
    
        $response = $this->post(route('startExam.destroy', ['course_id' => $course->id, 'id' => $startExam->id]), $post);

        $deleted = StartExam::find($startExam->id);

        if($deleted == null):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }
}
