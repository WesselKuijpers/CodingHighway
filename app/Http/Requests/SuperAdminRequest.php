<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class SuperAdminRequest
 * Request class to validate the requests of create and delete SuperAdmin
 * @package App\Http\Requests
 */
class SuperAdminRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (Auth::user()->canSaCreate()):
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
      'is_admin' => 'required|boolean'
    ];
  }
}
