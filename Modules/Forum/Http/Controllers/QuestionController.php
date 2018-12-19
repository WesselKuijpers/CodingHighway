<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Forum\Entities\Question;
use Modules\Forum\Entities\Topic;

class QuestionController extends Controller
{
  public function show(Topic $topic, Question $question)
  {
    return view('forum::question.show', compact('topic', 'question'));
  }
}
