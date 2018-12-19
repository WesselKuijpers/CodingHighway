<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Forum\Entities\Topic;

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

  public function save(Request $request)
  {
    dd($request);
  }
}
