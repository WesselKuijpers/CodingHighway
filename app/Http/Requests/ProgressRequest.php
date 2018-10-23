<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProgressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()):
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
            'user_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'lesson_id' => 'nullable|numeric',
            'exercise_id' => 'nullable|numeric',
          ];
          break;
        case "PUT":
          $rules = [
            'id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'lesson_id' => 'nullable|numeric',
            'exercise_id' => 'nullable|numeric',
          ];
          break;
        case "DELETE":
          $rules = [
            'user_id' => 'required|numeric',
            'course_id' => 'required|numeric',
          ];
          break;
      endswitch;
      return $rules;
    }
}
