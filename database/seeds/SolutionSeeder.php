<?php

use Illuminate\Database\Seeder;
use Modules\Course\Entities\Solution;
use App\User;
use Modules\Course\Entities\Exercise;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::latest('id')->first();
        $exercise = Exercise::latest('id')->first();

        $solution = new Solution;
        $solution->user_id = $user->id;
        $solution->exercise_id = $exercise->id;
        $solution->content = "this is some fine content";
        
        $solution->save();
    }
}
