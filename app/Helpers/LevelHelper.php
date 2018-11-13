<?php

use App\Models\course\Level;
use App\Http\Requests\LevelRequest;
use App\Models\general\FlashMessage;
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
      return Redirect()->back()->with('error', FlashMessage::where('name', 'level.create.error')->first()->message);
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
      return Redirect()->back()->with('error', FlashMessage::where('name', 'level.update.error')->first()->message);
    endif;
  }
}