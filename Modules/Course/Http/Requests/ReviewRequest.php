<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
        switch ($this->method()):
        case "POST":
            $rules = [
                'user_id' => 'required|numeric|exists:users,id',
                'content' => 'required|string',
                'rating' => 'required|numeric',
                'solution_id' => 'required|numeric|exists:solutions,id'
            ];
        break;
        case "PUT":
            $rules = [
                'id' => 'required|numeric|exists:reviews,id',
                'user_id' => 'required|numeric|exists:users,id',
                'content' => 'required|string',
                'rating' => 'required|numeric',
                'solution_id' => 'required|numeric|exists:solutions,id'
            ];
            break;
        case "DELETE":
            $rules = ['id' => 'required|numeric|exists:reviews,id'];
            break;
        endswitch;

        return $rules;
    }
}
