<?php

use Illuminate\Database\Seeder;

class LessonMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lesson_media')->delete();
        
        \DB::table('lesson_media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'lesson_id' => 2,
                'media_id' => 4,
                'created_at' => '2018-11-29 11:18:16',
                'updated_at' => '2018-11-29 11:18:16',
            ),
            1 => 
            array (
                'id' => 2,
                'lesson_id' => 4,
                'media_id' => 6,
                'created_at' => '2018-11-29 13:02:34',
                'updated_at' => '2018-11-29 13:02:34',
            ),
            2 => 
            array (
                'id' => 3,
                'lesson_id' => 5,
                'media_id' => 7,
                'created_at' => '2018-11-29 13:28:22',
                'updated_at' => '2018-11-29 13:28:22',
            ),
            3 => 
            array (
                'id' => 4,
                'lesson_id' => 6,
                'media_id' => 8,
                'created_at' => '2018-11-29 13:36:33',
                'updated_at' => '2018-11-29 13:36:33',
            ),
            4 => 
            array (
                'id' => 5,
                'lesson_id' => 7,
                'media_id' => 9,
                'created_at' => '2018-11-29 13:44:01',
                'updated_at' => '2018-11-29 13:44:01',
            ),
            5 => 
            array (
                'id' => 7,
                'lesson_id' => 8,
                'media_id' => 11,
                'created_at' => '2018-11-29 13:54:17',
                'updated_at' => '2018-11-29 13:54:17',
            ),
            6 => 
            array (
                'id' => 8,
                'lesson_id' => 11,
                'media_id' => 15,
                'created_at' => '2018-11-29 14:26:48',
                'updated_at' => '2018-11-29 14:26:48',
            ),
            7 => 
            array (
                'id' => 9,
                'lesson_id' => 11,
                'media_id' => 16,
                'created_at' => '2018-11-29 14:26:48',
                'updated_at' => '2018-11-29 14:26:48',
            ),
            8 => 
            array (
                'id' => 10,
                'lesson_id' => 12,
                'media_id' => 18,
                'created_at' => '2018-11-29 14:37:40',
                'updated_at' => '2018-11-29 14:37:40',
            ),
            9 => 
            array (
                'id' => 11,
                'lesson_id' => 3,
                'media_id' => 22,
                'created_at' => '2018-12-03 09:47:47',
                'updated_at' => '2018-12-03 09:47:47',
            ),
            10 => 
            array (
                'id' => 12,
                'lesson_id' => 3,
                'media_id' => 23,
                'created_at' => '2018-12-03 09:47:47',
                'updated_at' => '2018-12-03 09:47:47',
            ),
        ));
        
        
    }
}