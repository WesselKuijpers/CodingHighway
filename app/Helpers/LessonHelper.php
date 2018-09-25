<?php

use App\Models\course\Lesson;
use App\Http\Requests\LessonRequest;
use App\Models\course\LessonMedia;
use App\Models\general\Media;

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
      foreach ($validated['media'] as $m):
        $file = FileHelper::store($m);

        $media = new Media;
        $media->content = '/storage/media'.$file->hashName();
        if ($media->save()):
          $ml = new LessonMedia;
          $ml->media_id = $media->id;
          $ml->lesson_id = $lesson->id;
          $ml->save();
        endif;
      endforeach;

      return $lesson;
    else:
      return false;
    endif;
  }
}