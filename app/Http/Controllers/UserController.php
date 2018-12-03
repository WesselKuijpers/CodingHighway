<?php

namespace App\Http\Controllers;

use App\Models\general\FlashMessage;
use Illuminate\Http\RedirectResponse;
use UserHelper;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:user.edit');
  }

  public function edit()
  {
    $user = Auth::user();
    return view('user.edit', compact('user'));
  }

  public function save(UserEditRequest $request)
  {
    $edit = UserHelper::edit($request);
    if ($edit instanceof RedirectResponse):
      return $edit;
    endif;

    return redirect()->route('UserEdit')->with('msg', FlashMessageLoad('user.edit'));
  }
}
