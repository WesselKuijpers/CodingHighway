<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\LevelRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LevelHelper;

class LevelController extends Controller
{
  public function create(LevelRequest $request)
  {
    $data = LevelHelper::create($request);

    if ($data != false):
      return $data->toJson();
    else:
      return "{'Message':'Something went wrong'}";
    endif;
  }
}
