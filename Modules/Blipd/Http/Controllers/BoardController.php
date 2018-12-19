<?php

namespace Modules\Blipd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blipd\Entities\State;
use Modules\Blipd\Entities\Planning;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function __construct()
    {
      $this->middleware('LicenseCheck');
      $this->middleware('permission:blipd.board');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $planning = Auth::user()->plannings()->latest('created_at')->first();
        $states = State::all();
        return view('blipd::board.index', compact('planning', 'states'));
    }
}
