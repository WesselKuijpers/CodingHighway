<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $firstname = $this->command->ask('First name');
    $insertion = $this->command->ask('Insertion');
    $lastname = $this->command->ask('Last name');
    $email = $this->command->ask('Email');
    $password = $this->command->ask('Password');

    $user = new \App\User;
    $user->firstname = $firstname;
    $user->insertion = $insertion;
    $user->lastname = $lastname;
    $user->email = $email;
    $user->email_verified_at = \Carbon\Carbon::now();
    $user->password = bcrypt($password);
    $user->save();
  }
}
