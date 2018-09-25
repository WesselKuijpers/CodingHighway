<?php

use App\Models\course\Exercise;
use App\Http\Requests\ExerciseRequest;
use App\Models\course\ExerciseMedia;
use App\Models\general\Media;

/**
 * Class ExerciseHelper
 */
class ExerciseHelper
{
  /**
   * @param ExerciseRequest $request
   * @return Exercise|bool
   */
  public static function create(ExerciseRequest $request)
  {
    $validated = $request->validated();

    $exercise = new Exercise;
    $exercise->course_id = $validated['course_id'];
    $exercise->content = $validated['content'];
    $exercise->is_final = $validated['is_final'];
    $exercise->level_id = $validated['level_id'];

    if ($exercise->save()):
      foreach ($validated['media'] as $m):
        $file = FileHelper::store($m);

        $media = new Media;
        $media->content = '/storage/media/'.$file->hashName();
        if ($media->save()):
          $ml = new ExerciseMedia;
          $ml->media_id = $media->id;
          $ml->exercise_id = $exercise->id;
          $ml->save();
        endif;
      endforeach;

      return $exercise;
    else:
      return false;
    endif;
  }
}
