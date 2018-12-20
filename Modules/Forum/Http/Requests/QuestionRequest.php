<?php

namespace Modules\Forum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
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
          'title' => 'required|string',
          'user_id' => 'required|numeric',
          'exercise_id' => 'nullable|numeric',
          'lesson_id' => 'nullable|numeric',
          'topic_id' => 'required|numeric',
          'content' => 'required|string',
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'title' => 'required|string',
          'user_id' => 'required|numeric',
          'exercise_id' => 'nullable|numeric',
          'lesson_id' => 'nullable|numeric',
          'topic_id' => 'required|numeric',
          'content' => 'required|string',
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
