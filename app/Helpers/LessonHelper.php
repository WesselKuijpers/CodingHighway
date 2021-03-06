<?php

use Modules\Course\Entities\Lesson;
use Modules\Course\Entities\ExerciseLessons;
use Modules\Course\Http\Requests\LessonRequest;
use Modules\Course\Entities\LessonMedia;
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
   * @return Lesson|\Illuminate\Http\RedirectResponse
   */
  public static function create(LessonRequest $request)
  {
    $validated = $request->validated();
    
    try {
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

        if (!empty($validated['exercises'])):
          foreach($validated['exercises'] as $exercise):
            $le = new ExerciseLessons;
            $le->lesson_id = $lesson->id;
            $le->exercise_id = $exercise;
            $le->save();
          endforeach;
        endif;

        return $lesson;
      else:
        return redirect()->back()->with('error', FlashMessageLoad('lesson.create.error'));
      endif;
    }
    catch (\Illuminate\Database\QueryException $queryException){
      dd($queryException);
      return redirect()->back()->with('error', FlashMessageLoad('lesson.create.error'));
    }
  }

  /**
   * Handling of creating a new Lesson
   *
   * @param LessonRequest $request
   * @return Lesson|\Illuminate\Http\RedirectResponse
   */
  public static function update(LessonRequest $request)
  {
    $validated = $request->validated();

    try {
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
        return redirect()->back()->with('error', FlashMessageLoad('lesson.update.error'));
      endif;
    }
    catch (\Illuminate\Database\QueryException $queryException){
      return redirect()->back()->with('error', FlashMessageLoad('lesson.update.error'));
    }
  }
}