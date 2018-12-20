<?php

namespace Modules\Forum\Http\Controllers;

use AnswerHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Forum\Entities\Answer;
use Modules\Forum\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
  public function best(Request $request)
  {
    $answer = Answer::find($request->answer_id);
    $all = $answer->question->answers;

    foreach ($all as $ans):
      $ans->is_best = false;
      $ans->save();
    endforeach;

    $answer->is_best = true;
    $answer->save();

    $topic = $answer->question->topic->slug;
    $question = $answer->question->slug;
    return redirect()->route('QuestionShow', ['topic' => $topic, 'question'=>$question]);
  }

  public function save(AnswerRequest $request)
  {
    $answer = AnswerHelper::create($request);

    if ($answer instanceof RedirectResponse):
      return $answer;
    else:
      $question = $answer->question->slug;
      $topic = $answer->question->topic->slug;
      return redirect()->route('QuestionShow', ['question' => $question, 'topic'=>$topic])->with('msg', 'Antwoord opgeslagen');
    endif;
  }
}
