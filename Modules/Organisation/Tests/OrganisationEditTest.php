<?php

namespace Modules\Organisation\Tests;

use App\Models\general\Organisation;
use Faker\Provider\Color;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class OrganisationEditTest extends TestCase
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
   * A basic test example.
   *
   * @return void
   */
  public function testEdit()
  {
    $org = Organisation::first();

    $post = [
      '_method' => 'PUT',
      'id' => $org->id,
      'name' => 'Zisoo',
      'street' => 'Boeingavenue',
      'housenumber' => '150',
      'zipcode' => '7890 hi',
      'city' => 'Schiphol-Rijk',
      'email' => 'info@zisoo.nl',
      'paper_invoice' => 1,
      'color' => Color::hexColor(),
      'fontcolor' => Color::hexColor(),
      'link' => 'http://zisoo.nl',
      'phone' => '0203454156'
    ];

    $response = $this->post(route('organisation.update', ['id'=>$org->id]), $post);

    $new = Organisation::find($org->id);

    if (
      $new->name == $post['name'] &&
      $new->street == $post['street'] &&
      $new->housenumber == $post['housenumber'] &&
      $new->zipcode == $post['zipcode'] &&
      $new->city == $post['city'] &&
      $new->email == $post['email'] &&
      $new->paper_invoice == $post['paper_invoice'] &&
      $new->color == $post['color'] &&
      $new->fontcolor == $post['fontcolor'] &&
      $new->link == $post['link'] &&
      $new->phone == $post['phone']
    ):
      $this->assertTrue(true);
    else:
      $this->assertTrue(false);
    endif;
  }
}
