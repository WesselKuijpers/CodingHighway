<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LevelRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (Auth::user()->hasRole('sa')):
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
    $rules = [];
    switch($this->getMethod()):
      case "POST":
        $rules = [
          'name' => 'required|string|max:30',
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'name' => 'required|string|max:30'
        ];
        break;
      case "DELETE":
        $rules = [
          'id' => 'required|numeric'
        ];
        break;
    endswitch;
    return $rules;
  }
}
