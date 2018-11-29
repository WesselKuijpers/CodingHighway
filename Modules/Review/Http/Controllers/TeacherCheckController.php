<?php

namespace Modules\Review\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\course\Course;
use App\User;
use App\Solution;
use App\Http\Requests\ReviewRequest;
use ReviewHelper;

class TeacherCheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:teacher.check')->only(['index']);
        $this->middleware('permission:teacher.check.create')->only(['show', 'store']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $organisation = Auth::user()->organisation();
        if($organisation == null):
            return redirect()->route('home');
        endif;
        
        $students = User::has('solutions')->whereHas('organisations', function($query) use ($organisation) { $query->where('organisations.id', '=', $organisation->id);})->get();
        $courses = Course::all();
        return view('review::teacher.index', compact('organisation', 'students', 'courses'));
    }

    public function show(Solution $id)
    {
        return view('review::teacher.show', ['solution' => $id]);
    }

    public function store(ReviewRequest $request)
    {
        $data = ReviewHelper::create($request);

        return $data;
    }
}
