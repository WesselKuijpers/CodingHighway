<?php

use Illuminate\Database\Seeder;

class StartExamAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('start_exam_answers')->delete();
        
        \DB::table('start_exam_answers')->insert(array (
            0 => 
            array (
                'id' => 17,
                'content' => 'Een unieke waarde van een record',
                'question_id' => 6,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            1 => 
            array (
                'id' => 18,
                'content' => 'Een sleutel die verwijst naar een andere tabel',
                'question_id' => 6,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            2 => 
            array (
                'id' => 19,
                'content' => 'Een sleutel die data koppelt binnen een tabel',
                'question_id' => 6,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            3 => 
            array (
                'id' => 20,
                'content' => 'De sleutel die toegang geeft tot de database',
                'question_id' => 6,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            4 => 
            array (
                'id' => 21,
                'content' => '.sql',
                'question_id' => 7,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            5 => 
            array (
                'id' => 22,
                'content' => '.txt',
                'question_id' => 7,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            6 => 
            array (
                'id' => 23,
                'content' => '.db',
                'question_id' => 7,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            7 => 
            array (
                'id' => 24,
                'content' => '.erd',
                'question_id' => 7,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            8 => 
            array (
                'id' => 25,
                'content' => 'SELECT * FROM user',
                'question_id' => 8,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            9 => 
            array (
                'id' => 26,
                'content' => 'SELECT user',
                'question_id' => 8,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            10 => 
            array (
                'id' => 27,
                'content' => 'SELECT FROM user',
                'question_id' => 8,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
            11 => 
            array (
                'id' => 28,
                'content' => 'SELECT user FROM database',
                'question_id' => 8,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
        ));
        
        
    }
}