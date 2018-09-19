<?php

use App\Http\Requests\CourseEditRequest;
use App\Http\Requests\CourseRequest;
use App\Models\course\Course;

if (!function_exists('CourseCreate')) {

  /**
   * description
   *
   * @param
   * @return
   */
  function CourseCreate(CourseRequest $request)
  {
    $validated = $request->validated();

//      dd($validated);

    $course = new Course;
    $course->name = $validated['name'];
    $course->description = $validated['description'];
    $course->color = $validated['color'];
    if ($validated['media_id'] != 0):
      $course->media_id = $validated['media_id'];
    else:
      $course->media_id = null;
    endif;

    if ($course->save()):
      return $course;
    else:
      return false;
    endif;
  }
}

if (!function_exists('CourseEdit')) {

  /**
   * description
   *
   * @param
   * @return
   */
  function CourseEdit(CourseRequest $request)
  {
    $validated = $request->validated();

    $course = Course::find($validated['id']);
    $course->name = $validated['name'];
    $course->description = $validated['description'];
    $course->color = $validated['color'];
    if ($validated['media_id'] != 0):
      $course->media_id = $validated['media_id'];
    else:
      $course->media_id = null;
    endif;

    if ($course->save()):
      return $course;
    else:
      return false;
    endif;
  }
}

if (!function_exists('CourseDelete')) {

  /**
   * description
   *
   * @param
   * @return
   */
  function CourseDelete(CourseRequest $request)
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
