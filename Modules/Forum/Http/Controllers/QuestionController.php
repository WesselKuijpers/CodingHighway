<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Forum\Entities\Topic;

class QuestionController extends Controller
{
  /**
   * Display a listing of the resource.
   * @param Topic $topic
   * @return Response
   */
  public function index(Topic $topic)
  {
    $questions = $topic->questions;
    return view('forum::question.index', compact('topic', 'questions'));
  }
}
