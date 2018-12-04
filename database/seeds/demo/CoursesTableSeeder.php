<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Database Ontwerpen Leerjaar 1',
                'description' => '<p>Database Ontwerpen Leerjaar 1</p>',
                'color' => '#48b0e8',
                'media_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2018-11-29 09:55:20',
                'updated_at' => '2018-11-29 09:57:09',
            ),
        ));
        
        
    }
}