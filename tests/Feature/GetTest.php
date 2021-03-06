<?php

namespace Tests\Feature;

use App\User;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\general\License;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class GetTest extends TestCase
{
  use RefreshDatabase;

  public function setUp()
  {
    parent::setUp();
    Artisan::call('migrate', ['--env' => 'testing']);
    Artisan::call('db:seed', ['--env' => 'testing']);
  }

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testGetRoutesWithUser()
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
    $sa = Role::where('slug', 'sa')->first();
    $activate = Permission::where('slug', 'user.activate')->first();
    $user->detachAllRoles();
    $user->attachRole($sa);
    $user->attachPermission($activate);
    $license = License::where('user_id', null)->first();
    $license->user_id = $user->id;
    $license->save();

    $routes = \Route::getRoutes()->getRoutesByMethod()["GET"];

    foreach ($routes as $route):
      if (
        $route->uri == "login" ||
        $route->uri == "register" ||
        $route->uri == "password/reset" ||
        $route->uri == "email/resend" ||
        $route->uri == "organisation/create" ||
        strpos($route->uri, 'blipd') !== false
      ):
        continue;
      endif;
      if (strpos($route->uri, '{') === false):
        $response = $this->actingAs($user)->get($route->uri);
        if ($response->getStatusCode() == 500):
          dd($response);
        endif;
        $response->assertSuccessful();
      endif;
    endforeach;
  }

  public function testGetRoutesWithoutUser()
  {
    $routes = \Route::getRoutes()->getRoutesByMethod()["GET"];

    foreach ($routes as $route):
      if (
        $route->uri == "login" ||
        $route->uri == "register" ||
        $route->uri == "password/reset"
      ):
        $response = $this->get($route->uri);
        if ($response->getStatusCode() == 500):
          dd($response);
        endif;
        $response->assertSuccessful();
      endif;
    endforeach;
  }
}
