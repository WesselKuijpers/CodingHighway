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
    switch ($this->getMethod()):
      case "POST":
      case "PUT":
        return true;
        break;
    endswitch;
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
    if ($this->url() == route('organisation.activate')):
      return $rules = [
        'organisation_id' => 'required|numeric|exists:organisations,id'
      ];
    endif;
    switch ($this->getMethod()):
      case "POST":
        $rules = [
          'name' => 'required|string|max:60',
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
          'requester' => 'required|numeric|exists:users,id'
        ];
        break;
      case "PUT":
        $rules = [
          'id' => 'required|numeric',
          'name' => 'required|string|max:60',
          'street' => 'required|string',
          'housenumber' => 'required|string',
          'zipcode' => 'required|string',
          'city' => 'required|string',
          'email' => 'required|string',
          'paper_invoice' => 'nullable|boolean',
          'color' => 'required|string|regex:/#([a-fA-F0-9]){3,6}/',
          'fontcolor' => 'required|string|regex:/#([a-fA-F0-9]){3,6}/',
          'link' => 'required|string',
          'media' => 'nullable|file',
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
