<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class ExerciseRequest
 * Request class to validate the requests of create, edit and delete Exercises
 * @package App\Http\Requests
 */
class ExerciseRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    switch ($this->getMethod()):
      case 'POST':
        if (Auth::user()->canExerciseCreate()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'PUT':
        if (Auth::user()->canExerciseEdit()):
          return true;
        else:
          return false;
        endif;

        break;
      case 'DELETE':
        if (Auth::user()->canExerciseDelete()):
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
          'course_id' => 'required|numeric',
          'title' => 'required|string|max:50',
          'content' => 'required|string',
          'is_final' => 'required|boolean',
          'level_id' => 'required|numeric',
          'is_first' => 'nullable|boolean',
          'next_id' => 'nullable|numeric',
          'media.*' => 'file'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'course_id' => 'required|numeric',
          'title' => 'required|string|max:50',
          'content' => 'required|string',
          'is_final' => 'required|boolean',
          'is_first' => 'nullable|boolean',
          'next_id' => 'nullable|numeric',
          'level_id' => 'required|numeric',
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
