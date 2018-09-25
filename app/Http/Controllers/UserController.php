<?php

namespace App\Http\Controllers;

use UserHelper;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function __contruct()
  {
    $this->middleware('LicenseCheck');
  }

  public function edit()
  {
    $user = Auth::user();
    return view('user.edit', compact('user'));
  }

  public function save(UserEditRequest $request)
  {
    UserHelper::edit($request);
    return redirect()->route('UserEdit')->with('msg', 'Wijzigingen opgeslagen');
  }
}
