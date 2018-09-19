<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
  public function create(CourseRequest $request)
  {
    $data = CourseCreate($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function edit(CourseRequest $request)
  {
    $data = CourseEdit($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function delete(CourseRequest $request)
  {
    $data = CourseDelete($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }
}
