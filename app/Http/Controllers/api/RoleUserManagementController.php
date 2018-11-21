<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use jeremykenedy\LaravelRoles\Models\Role;

class RoleUserManagementController extends Controller
{
  public function change(Request $request)
  {
//    return $request->user_id;
    $user = User::find($request->user_id);
    $role = Role::where('slug', $request->role_slug)->first();

    if ($request->attach) {
      $user->attachRole($role);

      return "OK";
    } else if (!$request->attach) {
      $user->detachRole($role);

      return "OK";
    }

    return 'BAD';
  }
}
