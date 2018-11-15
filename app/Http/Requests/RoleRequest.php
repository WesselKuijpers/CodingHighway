<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RoleRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (Auth::check()):
      switch ($this->method()):
        case "POST":
          if (Auth::user()->canRoleCreate()):
            return true;
          else:
            return false;
          endif;
          break;
        case "PUT":
          if (Auth::user()->canRoleEdit()):
            return true;
          else:
            return false;
          endif;
          break;
        case "DELETE":
          if (Auth::user()->canRoleEdit()):
            return true;
          else:
            return false;
          endif;
          break;
      endswitch;
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
    switch ($this->method()):
      case "POST":
        $rules = [
          'name' => 'required|string|max:50',
          'slug' => 'required|alpha|max:50',
          'description' => 'nullable|string|max:255',
          'level' => 'required',
          'permissions.*' => 'required|numeric'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric|exists:roles',
          'name' => 'required|string|max:50',
          'slug' => 'required|alpha|max:50',
          'description' => 'nullable|string|max:255',
          'level' => 'required',
          'permissions.*' => 'required|numeric'
        ];
        break;
    endswitch;

    return $rules;
  }
}
