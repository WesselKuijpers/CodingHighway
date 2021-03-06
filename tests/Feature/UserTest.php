<?php

namespace Tests\Feature;

use App\Models\general\License;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
  use RefreshDatabase;
  use WithoutMiddleware;

  public function setUp()
  {
    parent::setUp();
    Artisan::call('migrate', ['--env' => 'testing']);
    Artisan::call('db:seed', ['--env' => 'testing']);
  }

  public function testUserCreate()
  {
    $post = [
      'firstname' => 'Testman',
      'insertion' => 'the',
      'lastname' => 'Tester',
      'email' => 'test@test.nl',
      'password' => 'testpass',
      'password_confirmation' => 'testpass'
    ];

    $this->post(route('register'), $post);

    $user = User::latest('id')->first();

    if (
      $user->firstname == 'Testman' &&
      $user->insertion == 'the' &&
      $user->lastname == 'Tester' &&
      $user->email == 'test@test.nl'
    ):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }

  public function testUserEdit()
  {
    $post = [
      'firstname' => 'Testman',
      'insertion' => 'the',
      'lastname' => 'Tester',
      'email' => 'test@test.nl',
      'password' => 'testpass',
      'password_confirmation' => 'testpass'
    ];

    $this->post(route('register'), $post);
    $user = User::latest('id')->first();

    $post2 = [
      'user_id' => $user->id,
      'firstname' => 'Bugger',
      'insertion' => 'de',
      'lastname' => 'Bugman',
      'email' => 'this@bug.com'
    ];

    $this->actingAs($user)
         ->post(route('UserEditSave'), $post2);

    $user = User::latest('id')->first();

    if (
      $user->firstname == 'Bugger' &&
      $user->insertion == 'de' &&
      $user->lastname == 'Bugman' //&&
      //$user->email == 'this@bug.com'
    ):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }

  public function testUserActivate()
  {
    $post = [
      'firstname' => 'Testman',
      'insertion' => 'the',
      'lastname' => 'Tester',
      'email' => 'test@test.nl',
      'password' => 'testpass',
      'password_confirmation' => 'testpass'
    ];

    $this->post(route('register'), $post);
    $user = User::latest('id')->first();
    $license = License::where('user_id', null)->first();

    $post2 = [
      'user_id' => $user->id,
      'key' => $license->key
    ];

    $repspone = $this->actingAs($user)->post(route('UserActivateLicenseSave'), $post2);
    $user = User::latest('id')->first();
    $license = License::where('user_id', $user->id)->first();

    if (
      $user->license->count() ==  1 &&
      $license->user_id == $user->id
    ):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }
}
