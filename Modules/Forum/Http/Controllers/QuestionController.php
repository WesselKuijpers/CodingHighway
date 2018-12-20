<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Exercise;
use Modules\Course\Entities\Lesson;
use Modules\Forum\Entities\Question;
use Modules\Forum\Entities\Topic;
use Modules\Forum\Http\Requests\QuestionRequest;
use QuestionHelper;

class QuestionController extends Controller
{
  public function show(Topic $topic, Question $question)
  {
    return view('forum::question.show', compact('topic', 'question'));
  }

  public function create(Topic $topic)
  {
    $exercises = Exercise::where('course_id', $topic->course_id)->get();
    $lessons = Lesson::where('course_id', $topic->course_id)->get();
    return view('forum::question.create', compact('topic', 'exercises', 'lessons'));
  }

  public function save(QuestionRequest $request)
  {
    $question = QuestionHelper::create($request);

    if ($question instanceof RedirectResponse):
      return $question;
    else:
      return redirect()->route('TopicIndex', ['topic' => $question->topic->slug]);
    endif;
  }

  public function solve(Request $request)
  {

    $question = Question::find($request->question_id);
    $question->solved = 1;
    $question->save();

    return redirect()->route('QuestionShow', ['topic' => $question->topic->slug, 'question' => $question->slug]);
  }
}
