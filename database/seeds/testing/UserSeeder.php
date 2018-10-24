<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class TestUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //user 1

    $id = 1;
    $firstname = 'Testman1';
    $insertion = 'the';
    $lastname = 'Tester1';
    $email = 'test1@test1.nl';
    $password = 'testpass';

    $user = new User;
    $user->id = $id;
    $user->firstname = $firstname;
    $user->insertion = $insertion;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->email_verified_at = \Carbon\Carbon::now();
    $user->password = Hash::make($password);
    $user->api_token = Faker\Provider\Uuid::uuid();
    $user->save();

    // user 2

    $id = 2;
    $firstname = 'Testman2';
    $insertion = 'the';
    $lastname = 'Tester2';
    $email = 'test2@test.nl';
    $password = 'testpass';

    $user = new User;
    $user->id = $id;
    $user->firstname = $firstname;
    $user->insertion = $insertion;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->email_verified_at = \Carbon\Carbon::now();
    $user->password = Hash::make($password);
    $user->api_token = Faker\Provider\Uuid::uuid();
    $user->save();

    // user 3

    $id = 3;
    $firstname = 'Testman3';
    $insertion = 'the';
    $lastname = 'Tester3';
    $email = 'test3@test.nl';
    $password = 'testpass';

    $user = new User;
    $user->id = $id;
    $user->firstname = $firstname;
    $user->insertion = $insertion;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->email_verified_at = \Carbon\Carbon::now();
    $user->password = Hash::make($password);
    $user->api_token = Faker\Provider\Uuid::uuid();
    $user->save();

    // user 4

    $id = 4;
    $firstname = 'Testman4';
    $insertion = 'the';
    $lastname = 'Tester4';
    $email = 'test4@test.nl';
    $password = 'testpass';

    $user = new User;
    $user->id = $id;
    $user->firstname = $firstname;
    $user->insertion = $insertion;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->email_verified_at = \Carbon\Carbon::now();
    $user->password = Hash::make($password);
    $user->api_token = Faker\Provider\Uuid::uuid();
    $user->save();

    factory(User::class, 20)->create();
  }
}
