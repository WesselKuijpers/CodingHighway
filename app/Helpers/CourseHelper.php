<?php

use App\Http\Requests\CourseRequest;
use App\Models\course\Course;
use App\Models\general\FlashMessage;
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
        return redirect()->back()->with('error', FlashMessage::where('name', 'course.create.error')->first()->message);
      endif;
    } catch (QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessage::where('name', 'course.create.error')->first()->message);
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
        return redirect()->back()->with('error', FlashMessage::where('name', 'course.update.error')->first()->message);
      endif;
    } catch (QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessage::where('name', 'course.update.error')->first()->message);
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