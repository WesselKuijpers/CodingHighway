<?php

use App\Http\Requests\UserActivateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\general\License;
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
   * @return bool
   */
  public static function activate(UserActivateRequest $request)
  {
    $validated = $request->validated();

    $user = Auth::user();
    if ($request->authorize()):
      $license = License::where('key', $validated['key'])->first();

      $license->user_id = $user->id;
      if ($license->save()):
        return $license;
      else:
        return false;
      endif;
    endif;
    return false;
  }

  /**
   * Handling of editing user details
   *
   * @param UserEditRequest $request
   * @return bool|\Illuminate\Contracts\Auth\Authenticatable|null
   */
  public static function edit(UserEditRequest $request)
  {
    $validated = $request->validated();

    $user = Auth::user();
    if ($request->authorize()):
      $user->firstname = $validated['firstname'];
      $user->insertion = $validated['insertion'];
      $user->lastname = $validated['lastname'];
      if ($user->save()):
        return $user;
      else:
        return false;
      endif;
    endif;
    return false;
  }
}