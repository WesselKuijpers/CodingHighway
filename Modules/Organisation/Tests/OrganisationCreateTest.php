<?php

namespace Modules\Organisation\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\general\Organisation;
use Illuminate\Support\Facades\Artisan;

class OrganisationCreateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate', ['--env' => 'testing']);
        Artisan::call('db:seed', ['--env' => 'testing']);
    }

    public function testCreateOrganisation()
    {
        $post = [
            'name' => 'TestOrg',
            'street' => 'TestStreet',
            'housenumber' => '22',
            'zipcode' => '9999ZZ',
            'city' => 'TestCity',
            'email' => 'support@testorg.com',
            'paper_invoice' => 1,
            'color' => '#fff',
            'fontcolor' => '#000',
            'link' => 'https://www.testorg.com',
            'media' => null
        ];

        $response = $this->post(route('organisation.store'), $post);

        $new = Organisation::latest('id')->first();

        if(
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
            $new->image == $post['media']
        ):
            return $this->assertTrue(true);
        else:
            return $this->assertTrue(false);
        endif;
    }

    public function testOrganisationZipRegex()
    {
        $post = [
            'name' => 'TestOrg',
            'street' => 'TestStreet',
            'housenumber' => '22',
            'zipcode' => 'Deffo-not-a-zipcode',
            'city' => 'TestCity',
            'email' => 'support@testorg.com',
            'paper_invoice' => 1,
            'color' => '#fff',
            'fontcolor' => '#000',
            'link' => 'https://www.testorg.com',
            'media' => null
        ];

        $response = $this->post(route('organisation.store'), $post);

        // dd($response->exception->validator->invalid());
        
        if (array_key_exists('zipcode', $response->exception->validator->invalid())):
            return $this->assertTrue(true);
        else:
            return $this->assertTrue(false);
        endif;
    }

    public function testOrganisationLinkValidation()
    {
        $post = [
            'name' => 'TestOrg',
            'street' => 'TestStreet',
            'housenumber' => '22',
            'zipcode' => '1111AA',
            'city' => 'TestCity',
            'email' => 'support@testorg.com',
            'paper_invoice' => 1,
            'color' => '#fff',
            'fontcolor' => '#000',
            'link' => 'deffo-not-a-weblink',
            'media' => null
        ];

        $response = $this->post(route('organisation.store'), $post);

        // dd($response->exception->validator->invalid());
        
        if (array_key_exists('link', $response->exception->validator->invalid())):
            return $this->assertTrue(true);
        else:
            return $this->assertTrue(false);
        endif;
    }

    public function testOrganisationEmailValidation()
    {
        $post = [
            'name' => 'TestOrg',
            'street' => 'TestStreet',
            'housenumber' => '22',
            'zipcode' => '1111AA',
            'city' => 'TestCity',
            'email' => 'deffo-not-a-valid-email',
            'paper_invoice' => 1,
            'color' => '#fff',
            'fontcolor' => '#000',
            'link' => 'https://www.testorg.com',
            'media' => null
        ];

        $response = $this->post(route('organisation.store'), $post);

        // dd($response->exception->validator->invalid());
        
        if (array_key_exists('email', $response->exception->validator->invalid())):
            return $this->assertTrue(true);
        else:
            return $this->assertTrue(false);
        endif;
    }

    public function testOrganisationHexRegex()
    {
        $post = [
            'name' => 'TestOrg',
            'street' => 'TestStreet',
            'housenumber' => '22',
            'zipcode' => '1111AA',
            'city' => 'TestCity',
            'email' => 'support@testorg.com',
            'paper_invoice' => 1,
            'color' => 'deffo-not-a-valid-hex',
            'fontcolor' => 'deffo-not-a-valid-hex',
            'link' => 'https://www.testorg.com',
            'media' => null
        ];

        $response = $this->post(route('organisation.store'), $post);

        // dd($response->exception->validator->invalid());
        
        if (array_key_exists('color', $response->exception->validator->invalid()) && array_key_exists('fontcolor', $response->exception->validator->invalid())):
            return $this->assertTrue(true);
        else:
            return $this->assertTrue(false);
        endif;
    }
}
