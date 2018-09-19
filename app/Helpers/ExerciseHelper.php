<?php

use App\Http\Requests\ExerciseRequest;
use App\Models\course\Exercise;

if (!function_exists('ExerciseCreate')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function ExerciseCreate(ExerciseRequest $request)
    {
      $validated = $request->validated();

      $exercise = new Exercise;
      $exercise->course_id = $validated['course_id'];
      $exercise->content = $validated['content'];
      $exercise->is_final = $validated['is_final'];
      $exercise->level_id = $validated['level_id'];

      if ($exercise->save()):
        return $exercise;
      else:
        return false;
      endif;
    }
}
