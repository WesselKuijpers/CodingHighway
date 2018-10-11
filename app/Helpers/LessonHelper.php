<?php

use App\Models\course\Lesson;
use App\Http\Requests\LessonRequest;
use App\Models\course\LessonMedia;
use App\Models\general\Media;

/**
 * Class LessonHelper
 */
class LessonHelper
{
  /**
   * Handling of creating a new Lesson
   *
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
    if ($validated['next_id'] != 0) :
      $lesson->next_id = $validated['next_id'];
    else :
      $lesson->next_id = null;
    endif;
    $lesson->is_first = $validated['is_first'];

    if ($lesson->save()):
      if (!empty($validated['media'])):
        foreach ($validated['media'] as $m):
          $file = FileHelper::store($m);

          $media = new Media;
          $media->content = '/storage/media/' . $file->hashName();
          if ($media->save()):
            $ml = new LessonMedia;
            $ml->media_id = $media->id;
            $ml->lesson_id = $lesson->id;
            $ml->save();
          endif;
        endforeach;
      endif;

      return $lesson;
    else:
      return false;
    endif;
  }

  /**
   * Handling of creating a new Lesson
   *
   * @param LessonRequest $request
   * @return Lesson|bool
   */
  public static function update(LessonRequest $request)
  {
    $validated = $request->validated();

    $lesson = Lesson::find($validated['id']);
    $lesson->title = $validated['title'];
    $lesson->content = $validated['content'];
    $lesson->level_id = $validated['level_id'];
    $lesson->course_id = $validated['course_id'];
    if ($validated['next_id'] != 0) :
      $lesson->next_id = $validated['next_id'];
    else :
      $lesson->next_id = null;
    endif;
    $lesson->is_first = $validated['is_first'];

    if ($lesson->save()):
      if (!empty($validated['media'])):
        foreach ($validated['media'] as $m):
          $file = FileHelper::store($m);

          $media = new Media;
          $media->content = '/storage/media/' . $file->hashName();
          if ($media->save()):
            $ml = new LessonMedia;
            $ml->media_id = $media->id;
            $ml->lesson_id = $lesson->id;
            $ml->save();
          endif;
        endforeach;
      endif;

      return $lesson;
    else:
      return false;
    endif;
  }
}