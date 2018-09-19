<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LessonRequest extends FormRequest
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
          'title' => 'required|string|max:45',
          'content' => 'required|string',
          'course_id' => 'required|numeric',
          'media_id' => 'nullable|numeric'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'title' => 'required|string|max:45',
          'content' => 'required|string',
          'course_id' => 'required|numeric',
          'media_id' => 'nullable|numeric'
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
