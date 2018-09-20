<?php

use App\Models\course\Lesson;
use App\Http\Requests\LessonRequest;

class LessonHelper
{
  /**
   * @param LessonRequest $request
   * @return Lesson|bool
   */
  public static function create(LessonRequest $request)
  {
    $validated = $request->validated();

    $lesson = new Lesson;
    $lesson->title = $validated['title'];
    $lesson->content = $validated['content'];
    $lesson->level_id = $validated['level_id'];
    $lesson->course_id = $validated['course_id'];

    if ($lesson->save()):
      return $lesson;
    else:
      return false;
    endif;
  }
}