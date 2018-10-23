<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\ProgressRequest;
use App\UserProgress;
use Illuminate\Routing\Controller;
use App\Models\course\Lesson;
use App\Models\course\Exercise;

class ProgressController extends Controller
{
  public function Create(ProgressRequest $request)
  {
    $data = $request->validated();

    if (!empty($data['exercise_id'])):
      UserProgress::firstOrCreate([
        "user_id" => $data['user_id'],
        "course_id" => $data['course_id'],
        "exercise_id" => $data['exercise_id'],
      ]);
      $exercise = Exercise::find($data['exercise_id']);

      if ($exercise->next_id != null):
        return redirect()->route('exercise.show', ['course_id' => $data['course_id'], 'id' => $exercise->next_id]);
      endif;
    elseif (!empty($data['lesson_id'])):
      UserProgress::firstOrCreate([
        "user_id" => $data['user_id'],
        "course_id" => $data['course_id'],
        "lesson_id" => $data['lesson_id'],
      ]);
      $lesson = Lesson::find($data['lesson_id']);

      if ($lesson->next_id != null):
        return redirect()->route('lesson.show', ['course_id' => $data['course_id'], 'id' => $lesson->next_id]);
      endif;
    endif;

    return redirect()->route('course.show', ['id' => $data['course_id']]);
  }
}
