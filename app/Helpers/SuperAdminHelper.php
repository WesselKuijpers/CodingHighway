<?php

use App\User;
use App\Http\Requests\SuperAdminRequest;
use jeremykenedy\LaravelRoles\Models\Role;

class SuperAdminHelper
{
  public static function create(SuperAdminRequest $request)
  {
    $validated = $request->validated();
    $role = Role::where('slug', 'sa')->first();
    $user = User::find($validated['user_id']);

    if ($validated['is_admin']):
      $user->attachRole($role);
      return '{"Message":"Attached Role",
      "user": '.$user->toJson().',
      "role": '.$role.'}';
    else:
      $user->detachRole($role);
      return '{"Message":"Detached Role:",
      "user": '.$user->toJson().',
      "role": '.$role.'}';
    endif;
  }
}