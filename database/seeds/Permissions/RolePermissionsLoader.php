<?php
/**
 * Created by PhpStorm.
 * User: matthijsdevos
 * Date: 25-10-18
 * Time: 13:03
 */

use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;

class RolePermissionsLoader
{
  private $UserPermissions, $CoursePermissions, $ExercisePermissions, $LessonPermissions, $LicensesPermissions;
  private $LevelPermissions, $SystemAdminPermissions, $OverigePermissions, $OrganisationPermissions;
  private $RoleAdminPermissions, $ModulePermissions, $TeacherPermissions, $BlipdPermissions;
  
  public function __construct()
  {
    $this->UserPermissions          = PermissionsLoader::UserPermissions();
    $this->CoursePermissions        = PermissionsLoader::CoursePermissions();
    $this->ExercisePermissions      = PermissionsLoader::ExercisePermissions();
    $this->LessonPermissions        = PermissionsLoader::LessonsPermissions();
    $this->LevelPermissions         = PermissionsLoader::LevelPermissions();
    $this->SystemAdminPermissions   = PermissionsLoader::SystemAdminPermissions();
    $this->OverigePermissions       = PermissionsLoader::OverigePermissions();
    $this->OrganisationPermissions  = PermissionsLoader::OrganisationPermissions();
    $this->LicensesPermissions      = PermissionsLoader::LicensePermissions();
    $this->RoleAdminPermissions     = PermissionsLoader::RoleAdminPermissions();
    $this->ModulePermissions        = PermissionsLoader::ModulePermissions();
    $this->TeacherPermissions       = PermissionsLoader::TeacherPermissions();
    $this->BlipdPermissions         = PermissionsLoader::BlipdPermissions();
    $this->GroupPermissions         = PermissionsLoader::GroupPermissions();
  }

  public function SystemAdmin()
  {
    $sa = Role::where('slug', 'sa')->first();

    $this->ListAttachesCUD($sa, $this->CoursePermissions);
    $this->ListAttachesCUD($sa, $this->ExercisePermissions);
    $this->ListAttachesCUD($sa, $this->LessonPermissions);
    $this->ListAttaches($sa, $this->LevelPermissions);
    $this->ListAttaches($sa, $this->SystemAdminPermissions);
    $this->ListAttaches($sa, $this->RoleAdminPermissions);
    $this->ListAttaches($sa, $this->ModulePermissions);
  }

  public function Admin()
  {
    $admin = Role::where('slug', 'admin')->first();

    $this->ListAttaches($admin, $this->OrganisationPermissions);
    $this->ListAttaches($admin, $this->LicensesPermissions);
  }

  public function Teacher()
  {
    $teacher = Role::where('slug', 'teacher')->first();

    $this->ListAttaches($teacher, $this->TeacherPermissions);
    $this->ListAttaches($teacher, $this->GroupPermissions);
  }

  public function User()
  {
    $user = Role::where('slug', 'user')->first();

    $this->ListAttachesS($user, $this->CoursePermissions);
    $this->ListAttachesS($user, $this->ExercisePermissions);
    $this->ListAttachesS($user, $this->LessonPermissions);
    $this->ListAttaches($user, $this->BlipdPermissions);

    $editData = $this->UserPermissions['edit'];

    if (Permission::where('slug', $editData['slug'])->count() == 1):
      $p = Permission::where('slug', $editData['slug'])->first();

      $user->attachPermission($p->id);
    endif;
  }

  private function ListAttaches($role, $list)
  {
    foreach ($list as $key => $permission):
      if (Permission::where('slug', $permission['slug'])->count() == 1):
        $p = Permission::where('slug', $permission['slug'])->first();

        $role->attachPermission($p->id);
      endif;
    endforeach;
  }

  private function ListAttachesCUD($role, $list)
  {
    foreach ($list as $key => $permission):
      if ($key == "show"):
        continue;
      endif;
      if (Permission::where('slug', $permission['slug'])->count() == 1):
        $p = Permission::where('slug', $permission['slug'])->first();

        $role->attachPermission($p->id);
      endif;
    endforeach;
  }

  private function ListAttachesS($role, $list)
  {
    foreach ($list as $key => $permission):
      if ($key != "show"):
        continue;
      endif;
      if (Permission::where('slug', $permission['slug'])->count() == 1):
        $p = Permission::where('slug', $permission['slug'])->first();

        $role->attachPermission($p->id);
      endif;
    endforeach;
  }
}