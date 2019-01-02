<?php

namespace Modules\Organisation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->canGroupCreate()):
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
        return [
            'organisation' => 'required|numeric',
            'course' => 'required|numeric',
            'teacher' => 'required|numeric',
            'users.*' => "numeric"
        ];
    }
}
