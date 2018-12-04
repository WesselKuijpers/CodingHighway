<?php

use Illuminate\Database\Seeder;

class StartExamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('start_exams')->delete();
        
        \DB::table('start_exams')->insert(array (
            0 => 
            array (
                'id' => 3,
                'course_id' => 1,
                'created_at' => '2018-11-29 10:36:17',
                'updated_at' => '2018-11-29 10:36:17',
            ),
        ));
        
        
    }
}