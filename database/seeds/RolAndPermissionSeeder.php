<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolAndPermissionSeeder extends Seeder
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
        'name' => 'Super Administratior',
        'slug' => 'sa',
        'level' => 2
      ]);
    endif;

    if (Role::where('slug', 'admin')->count() != 1):
      Role::create([
        'name' => 'Administrator',
        'slug' => 'admin',
        'level' => 1
      ]);
    endif;
  }
}
