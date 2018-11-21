<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolutionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
              'exercise_id' => 'required|numeric',
              'content' => 'required|string',
            ];
            break;
          case "PUT":
            $rules = [
              'id' => 'required|numeric',
              'user_id' => 'required|numeric',
              'exercise_id' => 'required|numeric',
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
