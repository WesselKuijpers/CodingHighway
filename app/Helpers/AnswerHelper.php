<?php

use Modules\Forum\Entities\Answer;
use Modules\Forum\Http\Requests\AnswerRequest;

class AnswerHelper
{
  public static function create(AnswerRequest $request)
  {
    $data = $request->validated();

    $answer = new Answer;
    $answer->content = $data['content'];
    $answer->user_id = $data['user_id'];
    $answer->question_id = $data['question_id'];
    $answer->is_best = 0;

    if ($answer->save()):
      return $answer;
    else:
      return redirect()->back()->with('error', 'Er ging iets fout tijdens het opslaan');
    endif;
  }

}