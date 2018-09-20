<?php

namespace App\Http\Controllers\api;

use LessonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;

class lessonController extends Controller
{
  public function create(LessonRequest $request)
  {
    $data = LessonHelper::create($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function edit(LessonRequest $request)
  {
    $data = LessonHelper::edit($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }

  public function delete(LessonRequest $request)
  {
    $data = LessonHelper::delete($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }
}
