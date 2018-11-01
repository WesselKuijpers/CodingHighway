<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserActivateRequest;
use App\Models\general\FlashMessage;
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
    if (License::where('key', $request->key)->count() == 1):
      $activate = UserHelper::activate($request);

      if ($activate instanceof \Illuminate\Http\RedirectResponse):
        return $activate;
      elseif ($activate === false):
        return redirect()->back()->with('error', FlashMessage::where('name', 'license.error')->first()->message);
      endif;

      Auth::user()->detachPermission(Permission::where('slug', 'user.activate')->first());

      return redirect()->route('home')->with('msg', FlashMessage::where('name', 'license.activated')->first()->message);
    else:
      return redirect()->back()->with('error', FlashMessage::where('name', 'license.invalid')->first()->message);
    endif;


  }
}
