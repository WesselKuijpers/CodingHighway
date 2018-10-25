<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class AdminPermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = Role::where('slug', 'admin')->first();

    $list = PermissionsLoader::OrganisationPermissions();

    foreach ($list as $key => $permission):
      if (Permission::where('slug', $permission['slug'])->count() == 1):
        $p = Permission::where('slug', $permission['slug'])->first();

        $admin->attachPermission($p);
      endif;
    endforeach;

    $list = PermissionsLoader::LicensePermissions();

    foreach ($list as $key => $permission):
      if (Permission::where('slug', $permission['slug'])->count() == 1):
        $p = Permission::where('slug', $permission['slug'])->first();

        $admin->attachPermission($p);
      endif;
    endforeach;
  }
}
