<?php

namespace Modules\Organisation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Organisation\Http\Requests\GroupRequest;
use GroupHelper;

class GroupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function store(GroupRequest $request)
    {
        if(empty($request['users'])):
            // TODO: change to dynamic flashmessage
            return redirect()->route('course.show', ['id' => $request['course']])->with('error', 'Je moet tenminste éé          n student aan een groep toevoegen');
        endif;
        $data = GroupHelper::create($request);

        if ($data instanceof RedirectResponse):
            return $data;
        else :
            // TODO: change to dynamic flashmessage
            return redirect()->route('course.show', ['id' => $data])->with('msg', 'Group aangemaakt!');
        endif;
    }
}
