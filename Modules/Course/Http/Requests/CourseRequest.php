<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CourseRequest
 * Request class to validate the requests of create, edit and delete Course
 * @package App\Http\Requests
 */
class CourseRequest extends FormRequest
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
        if (Auth::user()->canCourseCreate()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'PUT':
        if (Auth::user()->canCourseEdit()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'DELETE':
        if (Auth::user()->canCourseDelete()):
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
    switch ($this->getMethod()):
      case "POST":
        $rules = [
          'name' => 'required|string|max:255',
          'description' => 'required|string',
          'color' => 'required|string|regex:/#([a-fA-F0-9]){3,6}/',
          'media' => 'nullable|file',
          'private' => 'numeric'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'name' => 'required|string|max:255',
          'description' => 'required|string',
          'color' => 'required|string|regex:/#([a-fA-F0-9]){3,6}/',
          'media' => 'nullable|file',
          'private' => 'numeric'
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
