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
    $this->Creator(PermissionsLoader::UserPermissions());
    $this->Creator(PermissionsLoader::CoursePermissions());
    $this->Creator(PermissionsLoader::ExercisePermissions());
    $this->Creator(PermissionsLoader::LessonsPermissions());
    $this->Creator(PermissionsLoader::LevelPermissions());
    $this->Creator(PermissionsLoader::SystemAdminPermissions());
    $this->Creator(PermissionsLoader::OverigePermissions());
    $this->Creator(PermissionsLoader::OrganisationPermissions());
  }

  private function Creator($list)
  {
    foreach ($list as $key => $p):
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
        if ($permission->save() && env('APP_ENV') != 'testing'):
          echo "PERMISSION CREATED: {$permission->name}\n";
        endif;
      endif;
    endforeach;
  }


}
