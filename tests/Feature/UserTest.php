<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
  use RefreshDatabase;
  use WithoutMiddleware;

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
      return $this->assertTrue(true);
    else:
      return $this->assertTrue(false);
    endif;
  }
}
