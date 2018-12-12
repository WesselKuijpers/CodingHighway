<?php

namespace Modules\Course\Http\Controllers;

use Modules\Course\Http\Requests\LevelRequest;
use Modules\Course\Entities\Level;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use LevelHelper;

class LevelController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:level.show')->only(['index', 'show']);
    $this->middleware('permission:level.create')->only(['create', 'store']);
    $this->middleware('permission:level.edit')->only(['edit', 'update']);
    $this->middleware('permission:level.delete')->only(['destroy']);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    $levels = Level::all();
    return view('course::level.index', ['levels' => $levels]);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function create()
  {
    return view('course::level.create');
  }

  /**
   * @param LevelRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store(LevelRequest $request)
  {
    // attempts to create a level via the level helper
    $data = LevelHelper::create($request);

    // if successful redirect to level overview, if not redirect back with errors
    if ($data instanceof RedirectResponse):
      return $data;
    else :
      return redirect()->route('level')->with('msg', FlashMessageLoad('level.created'));
    endif;
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function edit($id)
  {
    // finds the level by id and passes it to the view
    $level = Level::find($id);
    return view('course::level.edit', ['level' => $level]);
  }

  /**
   * @param LevelRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update(LevelRequest $request)
  {
    // attempts to create a level via the LevelHelper
    $data = LevelHelper::update($request);

    // if successful redirect to the level overview, if not redirect back with errors
    if ($data instanceof RedirectResponse):
      return $data;
    else :
      return redirect()->route('level')->with('msg', FlashMessageLoad('level.updated'));
    endif;
  }

  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function destroy()
  {
  }
}
