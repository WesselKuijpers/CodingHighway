<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;

class lessonController extends Controller
{
  public function create(LessonRequest $request)
  {
    $data = LessonCreate($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function edit(LessonRequest $request)
  {
    $data = LessonEdit($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function delete(LessonRequest $request)
  {
    $data = LessonDelete($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }
}
