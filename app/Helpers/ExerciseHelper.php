<?php

use App\Models\course\Exercise;
use App\Http\Requests\ExerciseRequest;
use App\Models\course\ExerciseMedia;
use App\Models\general\FlashMessage;
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
   * @return Exercise|\Illuminate\Http\RedirectResponse
   */
  public static function create(ExerciseRequest $request)
  {
    $validated = $request->validated();

    try {
      $exercise = new Exercise;
      $exercise->course_id = $validated['course_id'];
      $exercise->title = $validated['title'];
      $exercise->content = $validated['content'];
      $exercise->is_final = $validated['is_final'];
      $exercise->level_id = $validated['level_id'];
      if ($validated['next_id'] != 0) :
        $exercise->next_id = $validated['next_id'];
      else :
        $exercise->next_id = null;
      endif;
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
        return redirect()->back()->with('error', FlashMessage::where('name', 'exercise.create.error')->first()->message);
      endif;
    }
    catch (\Illuminate\Database\QueryException $queryException){
      return redirect()->back()->with('error', FlashMessage::where('name', 'exercise.create.error')->first()->message);
    }
  }

  /**
   * Handling of updating a Exercise
   *
   * @param ExerciseRequest $request
   * @return Exercise|\Illuminate\Http\RedirectResponse
   */
  public static function update(ExerciseRequest $request)
  {
    $validated = $request->validated();

    try {
      $exercise = Exercise::find($validated['id']);
      $exercise->course_id = $validated['course_id'];
      $exercise->title = $validated['title'];
      $exercise->content = $validated['content'];
      $exercise->is_final = $validated['is_final'];
      $exercise->level_id = $validated['level_id'];
      if ($validated['next_id'] != 0) :
        $exercise->next_id = $validated['next_id'];
      else :
        $exercise->next_id = null;
      endif;
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
        return redirect()->back()->with('error', FlashMessage::where('name', 'exercise.create.error')->first()->message);
      endif;
    }
    catch (\Illuminate\Database\QueryException $queryException){
      return redirect()->back()->with('error', FlashMessage::where('name', 'exercise.create.error')->first()->message);
    }
  }

}
