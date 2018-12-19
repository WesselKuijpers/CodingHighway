<?php

namespace Modules\Blipd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blipd\Http\Requests\ReasonRequest;
use ReasonHelper;

class ReasonController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ReasonRequest $request)
    {
        $data = Reasonhelper::create($request);

        if ($data instanceof RedirectResponse):
            return $data;
        else :
            // TODO: change to dynamic flashmessage
            return redirect()->back()->with('msg', "Redenen opgeslagen.");
        endif;
    }
}
