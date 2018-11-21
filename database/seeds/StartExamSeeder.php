<?php

use Illuminate\Database\Seeder;
use App\Models\course\StartExam;
use App\Models\course\StartExamQuestion;
use App\Models\course\StartExamAnswer;
use App\Models\course\Course;

class StartExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::where('name', 'HTML')->first();
        $exam = new StartExam;

        $exam->course_id = $course->id;
        $exam->save();
        
        $questions = [
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
        ];

        foreach($questions as $question):
            $startExamQuestion = new StartExamQuestion;
            $startExamQuestion->start_exam_id = $exam->id;
            $startExamQuestion->content = $question['content'];
            if($startExamQuestion->save()):
                $saved = true;
            else:
                $saved = false;
            endif;

            // saves the correct answer
            $correct = new StartExamAnswer;
            $correct->content = $question['correct'];
            if($correct->save()):
                $saved = true;
            else:
                $saved = false;
            endif;

            // merge of correct answer and the question
            $startExamQuestion->correct_answer_id = $correct->id;
            if($startExamQuestion->save()):
                $saved = true;
            else:
                $saved = false;
            endif;

            $correct->question_id = $startExamQuestion->id;
            if($correct->save()):
                $saved = true;
            else:
                $saved = false;
            endif;

            // saves al the incorrect answers and merges them with the question
            foreach($question['inCorrect'] as $answer):
                $inCorrect = new StartExamAnswer;
                $inCorrect->content = $answer;
                $inCorrect->question_id = $startExamQuestion->id;
                if($inCorrect->save()):
                    $saved = true;
                else:
                    $saved = false;
                endif;
            endforeach;
        endforeach;
    }
}
