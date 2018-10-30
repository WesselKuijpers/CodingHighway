<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\general\License;
use App\Models\general\Organisation;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class LicenseTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
  
    public function setUp()
    {
      parent::setUp();
      Artisan::call('migrate', ['--env' => 'testing']);
      Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function testGenerateLicenseKeysUnderThousand()
    {
        $org = Organisation::first();
        $previousCount = $org->licenses->count();

        $post = [
            'organisation_id' => $org->id,
            'amount' => 200
        ];

        $response = $this->post(route('licenses.generate'), $post);

        $org = Organisation::first();
        $newCount = $org->licenses->count();

        if($previousCount + 200 == $newCount):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }

    public function testGenerateLicenseKeysOverThousand()
    {
        $org = Organisation::first();
        $previousCount = $org->licenses->count();

        $post = [
            'organisation_id' => $org->id,
            'amount' => 1001
        ];

        $response = $this->post(route('licenses.generate'), $post);

        $org = Organisation::first();
        $newCount = $org->licenses->count();

        if($previousCount == $newCount):
            $this->assertTrue(true);
        else:
            $this->assertTrue(false);
        endif;
    }
}
