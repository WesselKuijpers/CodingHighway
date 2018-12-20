<?php

use Modules\Forum\Entities\Question;
use Modules\Forum\Http\Requests\QuestionRequest;

class QuestionHelper
{
  public static function create(QuestionRequest $request)
  {
    $data = $request->validated();

    $question = new Question;
    $question->title = $data['title'];
    $question->user_id = $data['user_id'];
    $question->exercise_id = (!empty($data['exercise_id'])) ? $data['exercise_id'] : null;
    $question->lesson_id = (!empty($data['lesson_id'])) ? $data['lesson_id'] : null;
    $question->topic_id = $data['topic_id'];
    $question->content = $data['content'];
    $question->solved = 0;

    if ($question->save()):
      return $question;
    else:
      return redirect()->back()->with('error', 'Er ging iets met het aanmaken van je vraag');
    endif;
  }
}