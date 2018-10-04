<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserEditRequest
 * Request class to validate the requests of edit User
 * @package App\Http\Requests
 */
class UserEditRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->input('user_id') == Auth::id() && Auth::user()->canUserEdit()):
      return true;
    else:
      return false;
    endif;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'user_id' => 'required|numeric',
      'firstname' => 'required|string',
      'insertion' => 'nullable|string',
      'lastname' => 'required|string',
      'email' => 'required|email'
    ];
  }
}
