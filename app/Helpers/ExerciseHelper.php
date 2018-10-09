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
   * Handling of creating a new Exercise
   *
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
    $exercise->next_exercise = $validated['next_exercise'];
    $exercise->is_first = $validated['is_first'];

    if ($exercise->save()):
      if (!empty($validated['media'])):
        foreach ($validated['media'] as $m):
          $file = FileHelper::store($m);

          $media = new Media;
          $media->content = '/storage/media/' . $file->hashName();
          if ($media->save()):
            $ml = new ExerciseMedia;
            $ml->media_id = $media->id;
            $ml->exercise_id = $exercise->id;
            $ml->save();
          endif;
        endforeach;
      endif;

      return $exercise;
    else:
      return false;
    endif;
  }

}
