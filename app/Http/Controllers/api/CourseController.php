<?php

namespace App\Http\Controllers\api;

use CourseHelper;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
  public function create(CourseRequest $request)
  {
    $data = CourseHelper::create($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function edit(CourseRequest $request)
  {
    $data = CourseHelper::edit($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function delete(CourseRequest $request)
  {
    $data = CourseHelper::delete($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }
}
