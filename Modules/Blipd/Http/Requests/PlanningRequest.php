<?php

namespace Modules\Blipd\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // TODO: make this a usefull check...
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
              'lessons.*' => 'numeric',
              'exercises.*' => 'numeric',
            ];
            break;
          case "PUT":
            $rules = [
              'id' => 'required|numeric',
              'lessons.*' => 'numeric',
              'exercises.*' => 'numeric',
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
