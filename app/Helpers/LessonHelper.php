<?php

use App\Http\Requests\LessonRequest;
use App\Models\course\Lesson;

if (!function_exists('LessonCreate')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function LessonCreate(LessonRequest $request)
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

if (!function_exists('LessonEdit')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function LessonEdit(LessonRequest $request)
    {

    }
}

if (!function_exists('LessonDelete')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function LessonDelete(LessonRequest $request)
    {

    }
}
