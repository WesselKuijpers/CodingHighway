<?php

namespace Modules\Blipd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Blipd\Http\Requests\PlanningRequest;
use Modules\Blipd\Entities\State;
use PlanningHelper;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    public function __construct()
    {
      $this->middleware('LicenseCheck');
      $this->middleware('permission:blipd.planning.create');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $courses = Course::where('organisation_id', Auth::user()->organisation_id)->orWhere('organisation_id', null)->get();
        $previousPlanning = Auth::user()->plannings()->latest('created_at')->first();
        $f = State::where('name', 'F')->first();
        $d = State::where('name', 'D')->first();
        $failed = [];
        $oldLessonCards = [];
        $oldExerciseCards = [];

        foreach(Auth::user()->plannings as $planning):
            foreach($planning->lessons as $lesson):
                if($lesson->state_id == $d->id):
                    array_push($oldLessonCards, $lesson->lesson->id);
                endif;
            endforeach;
            foreach($planning->exercises as $exercise):
                if($exercise->state_id == $d->id):
                    array_push($oldExerciseCards, $exercise->exercise->id);
                endif;
            endforeach;
        endforeach;

        if(!empty($previousPlanning)):
            if($previousPlanning->lessons->where('state_id', $f->id)->where('reason', null)->count()):
                $failed['lessons'] = $previousPlanning->lessons->where('state_id', $f->id)->where('reason', null);
            endif;
            if($previousPlanning->exercises->where('state_id', $f->id)->where('reason', null)->count()):
                $failed['exercises'] = $previousPlanning->exercises->where('state_id', $f->id)->where('reason', null);
            endif;
        endif;

        return view('blipd::planning.create', compact('courses', 'failed', 'oldLessonCards', 'oldExerciseCards'));
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
