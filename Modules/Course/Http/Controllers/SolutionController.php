<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use SolutionHelper;
use App\Http\Requests\SolutionRequest;
use App\Models\course\Exercise;
use App\Solution;

class SolutionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(SolutionRequest $request)
    {
        $data = SolutionHelper::Create($request);

        if($data):
            return back();
        else:
            return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
        endif;
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($id, SolutionRequest $request)
    {
        $data = SolutionHelper::Update($request);

        if($data):
            return back();
        else:
            return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id, SolutionRequest $request)
    {
        $data = SolutionHelper::Destroy($request);

        if($data):
            return back();
        else:
            return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
        endif;
    }
}
