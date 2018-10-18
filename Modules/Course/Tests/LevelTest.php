<?php

namespace Modules\Course\Tests;

use App\Models\course\Level;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LevelTest extends TestCase
{
  use RefreshDatabase;
  use WithoutMiddleware;

  public function setUp()
  {
    parent::setUp();
    Artisan::call('migrate', ['--env' => 'testing']);
    Artisan::call('db:seed', ['--env' => 'testing']);
  }

  public function testLevelCreate()
  {
    $post = [
      'name' => 'TestLevel'
    ];

    $response = $this->post(route('level.store'), $post);

    $level = Level::latest('id')->first();

    if ($level->name == 'TestLevel'):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }

  public function testLevelUpdate()
  {
    $level = Level::first();
//    dd($level);
    $post = [
      '_method' => 'PUT',
      'id' => $level->id,
      'name' => 'TestLevel'
    ];

    $response = $this->post(route('level.update', ['id' => $level->id]), $post);

    $level = Level::first();

    if ($level->name == 'TestLevel'):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }
}
