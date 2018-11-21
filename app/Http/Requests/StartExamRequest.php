<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;

class StartExamRequest extends FormRequest
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
          if (Auth::user()->canCourseCreate()):
            return true;
          else:
            return false;
          endif;
  
          break;
        case 'PUT':
          if (Auth::user()->canCourseEdit()):
            return true;
          else:
            return false;
          endif;
  
          break;
        case 'DELETE':
          if (Auth::user()->canCourseDelete()):
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
              'questions' => 'required|array',
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
