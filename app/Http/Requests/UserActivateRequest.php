<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserActivateRequest
 * Request class to validate the requests of entering your license key
 * @package App\Http\Requests
 */
class UserActivateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->input('user_id') == Auth::id()):
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
      'key' => 'required|string'
    ];
  }
}
