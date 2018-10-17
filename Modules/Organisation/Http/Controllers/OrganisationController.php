<?php

namespace Modules\Organisation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\OrganisationRequest;
use OrganisationHelper;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('organisation::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('organisation::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(OrganisationRequest $request)
    {
        // $data variable attempts to create a organisation via the organisation helper, if successful return true, else return false.
        $data = OrganisationHelper::create($request);

        // if $data is true redirect to the organisation overview, else redirect back with an error.
        if ($data != false):
            return redirect()->route('organisation');
        else:
            return back()->with('status', 'Er is iets mis gegaan met het verzenden!');
        endif;
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('organisation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('organisation::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
