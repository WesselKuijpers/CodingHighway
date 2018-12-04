<?php

use Illuminate\Database\Seeder;

class ExerciseMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exercise_media')->delete();
        
        \DB::table('exercise_media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'exercise_id' => 3,
                'media_id' => 5,
                'created_at' => '2018-11-29 12:56:58',
                'updated_at' => '2018-11-29 12:56:58',
            ),
            1 => 
            array (
                'id' => 2,
                'exercise_id' => 7,
                'media_id' => 12,
                'created_at' => '2018-11-29 14:03:53',
                'updated_at' => '2018-11-29 14:03:53',
            ),
            2 => 
            array (
                'id' => 3,
                'exercise_id' => 10,
                'media_id' => 13,
                'created_at' => '2018-11-29 14:21:55',
                'updated_at' => '2018-11-29 14:21:55',
            ),
            3 => 
            array (
                'id' => 4,
                'exercise_id' => 10,
                'media_id' => 14,
                'created_at' => '2018-11-29 14:21:55',
                'updated_at' => '2018-11-29 14:21:55',
            ),
            4 => 
            array (
                'id' => 5,
                'exercise_id' => 11,
                'media_id' => 17,
                'created_at' => '2018-11-29 14:31:41',
                'updated_at' => '2018-11-29 14:31:41',
            ),
            5 => 
            array (
                'id' => 6,
                'exercise_id' => 12,
                'media_id' => 19,
                'created_at' => '2018-12-03 09:04:48',
                'updated_at' => '2018-12-03 09:04:48',
            ),
            6 => 
            array (
                'id' => 7,
                'exercise_id' => 13,
                'media_id' => 20,
                'created_at' => '2018-12-03 09:12:27',
                'updated_at' => '2018-12-03 09:12:27',
            ),
        ));
        
        
    }
}