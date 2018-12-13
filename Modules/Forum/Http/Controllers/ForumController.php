<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Forum\Entities\Topic;

class ForumController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    $topics = Topic::all();
    return view('forum::index', compact('topics'));
  }
}
