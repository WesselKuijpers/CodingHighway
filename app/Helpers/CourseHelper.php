<?php

use App\Http\Requests\CourseRequest;
use App\Models\course\Course;

class CourseHelper
{
  public static function create(CourseRequest $request)
  {
    $validated = $request->validated();

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

  public static function edit(CourseRequest $request)
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