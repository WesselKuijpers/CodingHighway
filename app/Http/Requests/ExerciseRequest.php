<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ExerciseRequest extends FormRequest
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
    switch ($this->getMethod()):
      case "POST":
        $rules = [
          'course_id' => 'required|numeric',
          'content' => 'required|string',
          'is_final' => 'required|boolean',
          'level_id' => 'required|numeric',
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'course_id' => 'required|numeric',
          'content' => 'required|string',
          'is_final' => 'required|boolean',
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