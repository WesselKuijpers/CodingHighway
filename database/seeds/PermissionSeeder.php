<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $list = require_once 'Permissions.php';

    foreach ($list as $p):
      $permission = new Permission;

      if (Permission::where('slug', $p['slug'])->count() != 1):
        $permission->name = $p['name'];
        $permission->slug = $p['slug'];
        if (!empty($p['model'])):
        $permission->model = $p['model'];
        else:
          $permission->model = null;
        endif;
        $permission->description = $p['description'];
        if ($permission->save()):
          echo "PERMISSION CREATED: {$permission->name}\n";
        endif;
      endif;
    endforeach;
  }


}
