<?php

namespace Modules\Blipd\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
use App\User;
use Modules\Blipd\Entities\Planning;

class PlanningTest extends TestCase
{
  use RefreshDatabase;
  use WithoutMiddleware;

  public function setUp()
  {
    parent::setUp();
    Artisan::call('migrate', ['--env' => 'testing']);
    Artisan::call('db:seed', ['--env' => 'testing']);
  }

  // here we do not test the /blipd/planning/create route or Blipd/PlanningController@create, because it is being tested by the 'get-test'

  public function testPlanningStore()
  {
    // first off we create some post data, and fetch a user to go along with the request
    $user = User::first();

    $post = [
      'lessons' => [1, 2, 3],
      'exercises' => [1, 2, 3]
    ];

    // we post the data to the planning store route (acting as the user), and save the result in a variable
    $response = $this->actingAs($user)->post(route('planning.store'), $post);

    // we fetch the newest planning record from the DB (by ID)
    $planning = Planning::latest('id')->first();

    // check if the planning belongs to our user
    if ($planning->user->id != $user->id):
      $this->assertTrue(false);
    endif;

    // check if the planning contains the right ammount of exercises
    if ($planning->exercises->count() != 3):
      $this->assertTrue(false);
    endif;

    // check if the planning contains the right ammount of lessons
    if ($planning->lessons->count() != 3):
      $this->assertTrue(false);
    endif;

    // if all the checks succeed, assert true
    $this->assertTrue(true);
  }
}
