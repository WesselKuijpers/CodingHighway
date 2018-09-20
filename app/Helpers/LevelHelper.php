<?php

use App\Models\course\Level;
use App\Http\Requests\LevelRequest;

class LevelHelper
{
  public static function create(LevelRequest $request)
  {
    $validated = $request->validated();
    $level = new Level;

    $level->name = $validated['name'];

    if ($level->save()):
      return $level;
    else:
      return false;
    endif;
  }
}