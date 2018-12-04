<?php

use Illuminate\Database\Seeder;

class StartExamQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('start_exam_questions')->delete();
        
        \DB::table('start_exam_questions')->insert(array (
            0 => 
            array (
                'id' => 6,
                'start_exam_id' => 3,
                'content' => 'Wat is een primary key?',
                'correct_answer_id' => 17,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            1 => 
            array (
                'id' => 7,
                'start_exam_id' => 3,
                'content' => 'Met welke extensie MySQL scriptbestand op?',
                'correct_answer_id' => 21,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            2 => 
            array (
                'id' => 8,
                'start_exam_id' => 3,
                'content' => 'Hoe schrijf je een SELECT-query?',
                'correct_answer_id' => 25,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
        ));
        
        
    }
}