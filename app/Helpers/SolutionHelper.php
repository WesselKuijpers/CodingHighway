<?php

use App\Http\Requests\SolutionRequest;
use App\Solution;
use Illuminate\Support\Facades\Auth;

class SolutionHelper
{
    public static function Create(SolutionRequest $request)
    {
        $validated = $request->validated();
        $solution = new Solution;
        
        $solution->exercise_id = $validated['exercise_id'];
        $solution->user_id = Auth::id();
        $solution->content = $validated['content'];

        if($solution->save()):
            return true;
        else:
            return false;
        endif;
    }

    public static function Update(SolutionRequest $request)
    {
        $validated = $request->validated();
        $solution = Solution::find($validated['id']);
        
        $solution->exercise_id = $validated['exercise_id'];
        $solution->user_id = Auth::id();
        $solution->content = $validated['content'];

        if($solution->save()):
            return true;
        else:
            return false;
        endif;
    }

    public static function Delete(SolutionRequest $request)
    {
        $validated = $request->validated();
        $solution = Solution::find($validated['id']);

        if($solution->delete()):
            return true;
        else:
            return false;
        endif;
    }
}
