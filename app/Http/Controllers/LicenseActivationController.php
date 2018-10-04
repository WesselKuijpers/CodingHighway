<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserActivateRequest;
use App\Models\general\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Models\Permission;
use UserHelper;

class LicenseActivationController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:user.activate');
  }

  public function activate()
  {
    $user = Auth::user();

    return view('user.activate', compact('user'));
  }

  public function save(UserActivateRequest $request)
  {
    UserHelper::activate($request);
    Auth::user()->detachPermission(Permission::where('slug', 'user.activate')->first());

    return redirect()->route('home')->with('msg', 'Licentie geactiveerd');
  }
}
