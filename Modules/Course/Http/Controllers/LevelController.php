<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\course\Level;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use LevelHelper;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('course::level/index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('course::level/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(LevelRequest $request)
    {
      // attempts to create a level via the level helper
      $data = LevelHelper::create($request);

      // if successful redirect to level overview, if not redirect back with errors
      if ($data != false):
          return redirect('course/level');
      else :
          return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
      endif;
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('course::level/show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      // finds the level by id and passes it to the view
      $level = Level::find($id);
      return view('course::level/edit', ['level' => $level]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(LevelRequest $request)
    {
      // attempts to create a level via the LevelHelper
      $data = LevelHelper::edit($request);

      // if successful redirect to the level overview, if not redirect back with errors
      if ($data != false):
          return redirect('course/level');
      else :
          return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
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
