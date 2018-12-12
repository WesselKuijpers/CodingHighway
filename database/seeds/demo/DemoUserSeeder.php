<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Models\Role;

class DemoUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $saRole = Role::where('slug', 'sa')->first();
    $adminRole = Role::where('slug','admin')->first();
    $userRole = Role::where('slug', 'user')->first();

    $users = [
      'sa' => [
        'id' => 1,
        'firstname' => 'System',
        'lastname' => 'Administrator',
        'email' => 'sa@codinghighway.nl',
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => Hash::make('SApassword'),
        'api_token' => Faker\Provider\Uuid::uuid(),
      ],
      'admin' => [
        'id' => 2,
        'firstname' => 'Organisation',
        'lastname' => 'Administrator',
        'email' => 'admin@codinghighway.nl',
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => Hash::make('Adminpassword'),
        'api_token' => Faker\Provider\Uuid::uuid(),
      ],
      'user' => [
        'id' => 3,
        'firstname' => 'Demo',
        'lastname' => 'Gebruiker',
        'email' => 'demo@codinghighway.nl',
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => Hash::make('Userpassword'),
        'api_token' => Faker\Provider\Uuid::uuid(),
      ],
    ];

    $sa = new User;
    foreach ($users['sa'] as $key => $value):
      $sa->{$key} = $value;
    endforeach;
    $sa->save();
    $sa->attachRole($saRole);
    
    $admin = new User;
    foreach ($users['admin'] as $key => $value):
      $admin->{$key} = $value;
    endforeach;
    $admin->save();
    $admin->attachRole($adminRole);
    
    $user = new User;
    foreach ($users['user'] as $key => $value):
      $user->{$key} = $value;
    endforeach;
    $user->save();
    $user->attachRole($userRole);
    
  }
}
