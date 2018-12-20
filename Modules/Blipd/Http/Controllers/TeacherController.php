<?php

namespace Modules\Blipd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:blipd.planning.review');
    }
    /** 
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if(Auth::user()->organisation() != null):
            $students = Auth::user()->organisation()->users;
        endif;
        return view('blipd::teacher.index', compact('students'));
    }
}
