<?php

namespace Modules\Management\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use jeremykenedy\LaravelRoles\Models\Role;

class RoleUserController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:roleuser.management');
  }

  public function index()
  {
    $users = User::all();
    $roles = Role::all();
    return view('management::roleuser.index', compact('roles', 'users'));
  }
}
