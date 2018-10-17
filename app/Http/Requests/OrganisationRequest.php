<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganisationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (env('APP_ENV') == 'testing'):
            return true;
        endif;
        if ($this->getMethod() == 'POST') {
            return true;
        }
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
                'name' => 'required|string|max:45',
                'street' => 'required|string',
                'housenumber' => 'required|string',
                'zipcode' => 'required|string|regex:/([0-9]{4})\s{0,1}([a-zA-Z]{2})/',
                'city' => 'required|string',
                'email' => 'required|email',
                'paper_invoice' => 'nullable|boolean',
                'color' => 'required|string|regex:/#([a-fA-F0-9]){3,6}/',
                'fontcolor' => 'required|string|regex:/#([a-fA-F0-9]){3,6}/',
                'link' => 'nullable|url',
                'media' => 'nullable|file',
            ];
        break;
        case "PUT":
            $rules = [
                'id' => 'required|numeric',
                'name' => 'required|string|max:45',
                'street' => 'required|string',
                'housenumber' => 'required|string',
                'zipcode' => 'required|string',
                'city' => 'required|string',
                'email' => 'required|string',
                'paper_invoice' => 'nullable|boolean',
                'color' => 'required|string',
                'fontcolor' => 'required|string',
                'link' => 'required|string',
                'media.*' => 'file',
            ];
        break;
        case "DELETE":
            $rules = [
                'id' => 'required|numeric',
            ];
        break;
        endswitch;
        return $rules;
    }
}
