<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (Auth::user()->hasRole('sa')):
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
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'color' => 'required|string',
      'media_id' => 'nullable|numeric'
    ];
  }
}
