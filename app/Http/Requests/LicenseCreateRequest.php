<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LicenseCreateRequest extends FormRequest
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
        switch ($this->getMethod()):
            case 'POST':
                if (Auth::user()->canLicensesCreate()):
                    return true;
                else:
                    return false;
                endif;

                break;
            case 'PUT':
                if (Auth::user()->canLicensesCreate()):
                    return true;
                else:
                    return false;
                endif;

                break;
            case 'DELETE':
                if (Auth::user()->canLicensesCreate()):
                    return true;
                else:
                    return false;
                endif;

                break;
            default:
                return false;
                break;
        endswitch;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'organisation_id' => 'required|numeric|exists:organisations,id|gt:0',
            'amount' => 'required|string|lte:1000'
        ];
        
        return $rules;
    }
}
