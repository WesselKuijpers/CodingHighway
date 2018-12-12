<?php

use Modules\Course\Entities\Level;
use Modules\Course\Http\Requests\LevelRequest;
use Illuminate\Http\RedirectResponse;

/**
 * Class LevelHelper
 */
class LevelHelper
{
  /**
   * Handling of create a new level
   *
   * @param LevelRequest $request
   * @return Level|RedirectResponse
   */
  public static function create(LevelRequest $request)
  {
    $validated = $request->validated();
    $level = new Level;

    $level->name = $validated['name'];

    if ($level->save()):
      return $level;
    else:
      return Redirect()->back()->with('error', FlashMessageLoad('level.create.error'));
    endif;
  }

  /**
   * Handling of create a new level
   *
   * @param LevelRequest $request
   * @return Level|RedirectResponse
   */
  public static function update(LevelRequest $request)
  {
    $validated = $request->validated();
    $level = Level::find($validated['id']);

    $level->name = $validated['name'];

    if ($level->save()):
      return $level;
    else:
      return Redirect()->back()->with('error', FlashMessageLoad('level.create.error'));
    endif;
  }
}