<?php

use App\Models\course\Level;
use App\Http\Requests\LevelRequest;

/**
 * Class LevelHelper
 */
class LevelHelper
{
  /**
   * Handling of create a new level
   *
   * @param LevelRequest $request
   * @return Level|bool
   */
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

  /**
   * Handling of create a new level
   *
   * @param LevelRequest $request
   * @return Level|bool
   */
  public static function update(LevelRequest $request)
  {
    $validated = $request->validated();
    $level = Level::find($validated['id']);

    $level->name = $validated['name'];

    if ($level->save()):
      return $level;
    else:
      return false;
    endif;
  }
}