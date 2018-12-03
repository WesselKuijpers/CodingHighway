<?php

use App\Http\Requests\RoleRequest;
use App\Models\general\FlashMessage;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class RoleHelper
{

  /**
   * @param RoleRequest $request
   * @return \Illuminate\Http\RedirectResponse|Role
   */
  public static function create(RoleRequest $request)
  {
    $data = $request->validated();

    try{
      $role = new Role;
      $role->name = $data['name'];
      $role->slug = $data['slug'];
      $role->description = $data['description'];
      $role->level = $data['level'];

      if ($role->save()):
        if(!empty($data['permissions'])):
          $role->syncPermissions($data['permissions']);
        endif;
        return $role;
      else:
        return redirect()->back()->with('error', FlashMessageLoad('role.create.error'));
      endif;
    }
    catch (\Illuminate\Database\QueryException $queryException){
      dd($queryException);
      return redirect()->back()->with('error', FlashMessageLoad('role.create.error'));
    }
  }

  /**
   * @param RoleRequest $request
   * @return \Illuminate\Http\RedirectResponse|Role
   */
  public static function update(RoleRequest $request)
  {
    $data = $request->validated();

    try{
      $role = Role::find($data['id']);
      $role->name = $data['name'];
      $role->slug = $data['slug'];
      $role->description = $data['description'];
      $role->level = $data['level'];

      if ($role->save()):
        if(!empty($data['permissions'])):
          $role->syncPermissions($data['permissions']);
        endif;
        return $role;
      else:
        return redirect()->back()->with('error', FlashMessageLoad('role.update.error'));
      endif;
    }
    catch (\Illuminate\Database\QueryException $queryException){
      dd($queryException);
      return redirect()->back()->with('error', FlashMessageLoad('role.update.error'));
    }
  }
}