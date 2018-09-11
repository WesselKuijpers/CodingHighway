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
    Role::create([
      'name' => 'Super Administratior',
      'slug' => 'sa',
      'level' => 2
    ]);

    Role::create([
      'name' => 'Administrator',
      'slug' => 'admin',
      'level' => 1
    ]);
  }
}
