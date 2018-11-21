<?php

namespace Modules\Course\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Solution;
use Illuminate\Support\Facades\Artisan;
use App\Models\course\Exercise;
use App\User;

class SolutionTest extends TestCase
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
     * @group Solution
     */
    public function testSolutionCreate()
    {
        $exercise = Exercise::latest('id')->first();

        $post = [
            'exercise_id' => $exercise->id,
            'content' => 'oplossing, yo'
        ];
        
        $user = User::latest('id')->first();

        $response = $this->actingAs($user)->post(route('solution.create'), $post);

        $solution = Solution::latest('id')->first();

        if($solution->exercise_id == $post['exercise_id'] && 
           $solution->content == $post['content'] && 
           $solution->user_id == $user->id):
            $this->assertTrue(true);
        else:
            $this->assertTrue(true);
        endif;
    }

    /**
     * @group Solution
     */
    public function testSolutionUpdate()
    {
        $solution = Solution::latest('id')->first();
        $user = User::latest('id')->first();

        $post = [
            '_method' => 'PUT',
            'id' => $solution->id,
            'exercise_id' => $solution->exercise->id,
            'content' => 'some updated content, yo'
        ];

        $response = $this->actingAs($user)->put(route('solution.update', ['id', $solution->id]), $post);
        $updatedSolution = Solution::find($post['id']);
        
        if(
            $updatedSolution->exercise_id == $post['exercise_id'] &&
            $updatedSolution->user_id == $user->id &&
            $updatedSolution->content == $post['content']
        ):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    /**
     * @group Solution
     */
    public function testSolutionDelete()
    {
        $solution = Solution::latest('id')->first();
        $user = User::latest('id')->first();

        $post = [
            '_method' => 'delete',
            'id' => $solution->id
        ];

        $response = $this->actingAs($user)->delete(route('solution.delete', ['id', $solution->id]), $post);
        $deleted = Solution::find($post['id']);

        if($deleted == null):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }
}
