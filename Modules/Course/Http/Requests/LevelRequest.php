<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class LevelRequest
 * Request class to validate the requests of create, edit and delete Level
 * @package App\Http\Requests
 */
class LevelRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (env('APP_ENV') == 'testing'):
      return true;
    endif;
    switch ($this->getMethod()):
      case 'POST':
        if (Auth::user()->canLevelCreate()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'PUT':
        if (Auth::user()->canLevelEdit()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'DELETE':
        if (Auth::user()->canLevelDelete()):
          return true;
        else:
          return false;
        endif;

        break;
      default:
        return false;
        break;
    endswitch;
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
          'name' => 'required|string|max:60',
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'name' => 'required|string|max:60'
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
