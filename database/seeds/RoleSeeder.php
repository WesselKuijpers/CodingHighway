<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    if (Role::where('slug', 'sa')->count() != 1):
      Role::create([
        'name' => 'System Administrator',
        'slug' => 'sa',
        'level' => 3
      ]);
    endif;

    if (Role::where('slug', 'admin')->count() != 1):
      Role::create([
        'name' => 'Administrator',
        'slug' => 'admin',
        'level' => 2
      ]);
    endif;

    if (Role::where('slug', 'user')->count() != 1):
      Role::create([
        'name' => 'Gebruiker',
        'slug' => 'user',
        'level' => 1
      ]);
    endif;
  }
}
