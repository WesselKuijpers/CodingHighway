<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class SaPermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $sa = Role::where('slug', 'sa')->first();
    $CreatePermissions = Permission::where('slug', 'like', '%create')->get();
    $EditPermissions = Permission::where('slug', 'like', '%edit')->get();
    $DeletePermissions = Permission::where('slug', 'like', '%delete')->get();

    foreach ($CreatePermissions as $permission):
      $sa->attachPermission($permission);
    endforeach;
    foreach ($EditPermissions as $permission):
      $sa->attachPermission($permission);
    endforeach;
    foreach ($DeletePermissions as $permission):
      $sa->attachPermission($permission);
    endforeach;
  }
}
