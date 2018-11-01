<?php

use App\Http\Requests\UserActivateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\general\FlashMessage;
use App\Models\general\License;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserHelper
 */
class UserHelper
{
  /**
   * Handling of activation user by means of the license key
   *
   * @param UserActivateRequest $request
   * @return Illuminate\Http\RedirectResponse|License
   */
  public static function activate(UserActivateRequest $request)
  {
    $validated = $request->validated();

    $user = Auth::user();
    try {
      $license = License::where('key', $validated['key'])->first();

      if ($license->user_id != 0 || $license->user_id != null):
        return redirect()->back()->with('error', FlashMessage::where('name', 'license.active')->first()->message);
      elseif ($license->expired):
        return redirect()->back()->with('error', FlashMessage::where('name', 'license.expired')->first()->message);
      endif;

      $license->user_id = $user->id;
      if ($license->save()):
        return $license;
      else:
        return redirect()->back()->with('error', FlashMessage::where('name', 'license.error')->first()->message);
      endif;
    }catch (QueryException $queryException){
      return redirect()->back()->with('error', FlashMessage::where('name', 'license.error')->first()->message);
    }
  }

  /**
   * Handling of editing user details
   *
   * @param UserEditRequest $request
   * @return \Illuminate\Contracts\Auth\Authenticatable|\Illuminate\Http\RedirectResponse
   */
  public static function edit(UserEditRequest $request)
  {
    $validated = $request->validated();

    $user = Auth::user();
    try {
      $user->firstname = $validated['firstname'];
      $user->insertion = $validated['insertion'];
      $user->lastname = $validated['lastname'];
      if ($user->save()):
        return $user;
      else:
        return redirect()->back()->with('error', FlashMessage::where('name', 'user.error')->first()->message);
      endif;
    } catch (QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessage::where('name', 'user.error')->first()->message);
    }
  }
}