<?php

use App\Http\Requests\StartExamRequest;
use App\Models\course\StartExam;
use App\Models\course\StartExamQuestion;
use App\Models\course\StartExamAnswer;
use Illuminate\Support\Facades\DB;

class StartExamHelper
{
    public static function Create(StartExamRequest $request)
    {
        // begin the transaction
        DB::beginTransaction();
        // bool keeps track if everything is saved correctly
        $saved = true;

        // validate the request
        $validated = $request->validated();

        // define a new startexam and checks if it's saved or not
        $startExam = new StartExam;
        $startExam->course_id = $validated['course_id'];
        if($startExam->save()):
            $saved = true;
        else:
            $saved = false;
        endif;

        // for every question create one in the database:
        foreach($validated['questions'] as $question):
            // create actual question
            $startExamQuestion = new StartExamQuestion;
            $startExamQuestion->start_exam_id = $startExam->id;
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

        // if everything is saved commit and return, else rollback
        if($saved == true):
            DB::commit();
            return true;
        else:
            DB::rollback();
            return false;
        endif;
    }

}