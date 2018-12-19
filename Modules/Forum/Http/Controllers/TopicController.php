<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Forum\Entities\Topic;
use Modules\Forum\Http\Requests\TopicRequest;
use TopicHelper;

class TopicController extends Controller
{
  public function index(Topic $topic)
  {
    $questions = $topic->questions;
    return view('forum::topic.index', compact('topic', 'questions'));
  }

  public function create()
  {
    $courses = Course::all();
    return view('forum::topic.create', compact('courses'));
  }

  public function save(TopicRequest $request)
  {
    $data = TopicHelper::create($request);

    if ($data instanceof RedirectResponse):
      return $data;
    else:
      return redirect()->route('ForumIndex')->with('msg', 'Topic aangemaakt');
    endif;
  }
}
