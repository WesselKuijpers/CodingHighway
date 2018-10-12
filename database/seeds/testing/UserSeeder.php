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
        $firstname = 'Testman';
        $insertion = 'the';
        $lastname = 'Tester';
        $email = 'test@test.nl';
        $password = 'testpass';

        $user = new User;
        $user->firstname = $firstname;
        $user->insertion = $insertion;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = Hash::make($password);
        $user->save();

        factory(User::class, 20)->create();
    }
}
