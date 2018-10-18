<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = Role::where('slug', 'user')->first();
      $ShowPermissions = Permission::where('slug', 'like', '%show')->get();
      $UserPermission = Permission::where('slug', 'user.edit')->first();

      $user->attachPermission($UserPermission);
      foreach ($ShowPermissions as $permission):
        if ($permission->slug == 'level.show'):
          continue;
        endif;
        $user->attachPermission($permission);
      endforeach;
    }
}
