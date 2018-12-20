<?php

use Modules\Course\Http\Requests\CourseRequest;
use Modules\Course\Entities\Course;
use App\Models\general\Media;
use Illuminate\Database\QueryException;

/**
 * Class CourseHelper
 */
class CourseHelper
{
  /**
   * Handling of creating a new Course
   *
   * @param CourseRequest $request
   * @return Course|\Illuminate\Http\RedirectResponse
   */
  public static function create(CourseRequest $request)
  {
    $validated = $request->validated();

    try {
      $course = new Course;
      $course->name = $validated['name'];
      $course->description = $validated['description'];
      $course->color = $validated['color'];
      $course->organisation_id = (!empty($validated['private'])) ? $validated['private'] : null;

      if ($course->save()):
        if (!empty($validated['media'])):
          $file = FileHelper::store($validated['media']);

          $media = new Media;
          $media->content = '/storage/media/' . $file->hashName();
          if ($media->save()):
            $course->media_id = $media->id;
          endif;
          $course->save();
        endif;

        return $course;
      else:
        return redirect()->back()->with('error', FlashMessageLoad('course.create.error'));
      endif;
    } catch (QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessageLoad('course.create.error'));
    }
  }

  /**
   * Handling of the editing of a Course
   *
   * @param CourseRequest $request
   * @return Course|\Illuminate\Http\RedirectResponse
   */
  public static function update(CourseRequest $request)
  {
    $validated = $request->validated();

    try {
      $course = Course::find($validated['id']);
      $course->name = $validated['name'];
      $course->description = $validated['description'];
      $course->color = $validated['color'];
      $course->organisation_id = (!empty($validated['private'])) ? $validated['private'] : null;

      if ($course->save()):
        if (!empty($validated['media'])):
          $file = FileHelper::store($validated['media']);

          $media = new Media;
          $media->content = '/storage/media/' . $file->hashName();
          if ($media->save()):
            $course->media_id = $media->id;
          endif;
          $course->save();
        endif;

        return $course;
      else:
        return redirect()->back()->with('error', FlashMessageLoad('course.update.error'));
      endif;
    } catch (QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessageLoad('course.create.error'));
    }
  }

  /**
   * Handling of deleting a Course
   *
   * @param CourseRequest $request
   * @return bool
   */
  public static function delete(CourseRequest $request)
  {
    $validated = $request->validated();

    $course = Course::find($validated['id']);

    if ($course->delete()):
      return $course;
    else:
      return false;
    endif;
  }
}