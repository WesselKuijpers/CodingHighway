<?php

namespace Modules\Blipd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Blipd\Http\Requests\PlanningRequest;
use PlanningHelper;

class PlanningController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('blipd::planning.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PlanningRequest $request)
    {
        $data = PlanningHelper::create($request);

        if ($data instanceof RedirectResponse):
            return $data;
        else :
            // TODO: change to dynamic flashmessage
            return redirect()->route('blipd')->with('msg', "Planning met succes aangemaakt.");
        endif;
    }
}
