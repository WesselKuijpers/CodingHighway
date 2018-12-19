<?php

namespace Modules\Forum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
          'name' => 'required|string',
          'course_id' => 'nullable|numeric',
          'media' => 'nullable|file'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'name' => 'required|string',
          'course_id' => 'nullable|numeric',
          'media' => 'nullable|file'
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
