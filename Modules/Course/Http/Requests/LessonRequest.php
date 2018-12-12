<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class LessonRequest
 * Request class to validate the requests of create, edit and delete Lesson
 * @package App\Http\Requests
 */
class LessonRequest extends FormRequest
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
        if (Auth::user()->canLessonCreate()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'PUT':
        if (Auth::user()->canLessonEdit()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'DELETE':
        if (Auth::user()->canLessonDelete()):
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
          'title' => 'required|string|max:60',
          'content' => 'required|string',
          'course_id' => 'required|numeric',
          'level_id' => 'nullable|numeric',
          'is_first' => 'nullable|boolean',
          'next_id' => 'nullable|numeric',
          'media.*' => 'file'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'title' => 'required|string|max:60',
          'content' => 'required|string',
          'course_id' => 'required|numeric',
          'is_first' => 'nullable|boolean',
          'next_id' => 'nullable|numeric',
          'level_id' => 'nullable|numeric',
          'media.*' => 'file'
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
