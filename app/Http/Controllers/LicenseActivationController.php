<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserActivateRequest;
use App\Models\general\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UserHelper;

class LicenseActivationController extends Controller
{
  public function activate()
  {
    $user = Auth::user();

    return view('user.activate', compact('user'));
  }

  public function save(UserActivateRequest $request)
  {
    UserHelper::activate($request);

    return redirect()->route('home')->with('msg', 'Licentie geactiveerd');
  }
}
