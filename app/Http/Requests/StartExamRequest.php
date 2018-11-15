<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartExamRequest extends FormRequest
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
              'course_id' => 'required|numeric',
              'questions' => 'required|array',
            ];
            break;
          case "PUT":
            $rules = [
              'id' => 'required|numeric',
              'course_id' => 'required|numeric',
              'questions' => 'required|array|gte:10',
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