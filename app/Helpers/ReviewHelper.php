<?php

use Modules\Course\Http\Requests\ReviewRequest;
use Modules\Course\Entities\Solution;
use Modules\Course\Entities\Review;

//TODO add flash messages
class ReviewHelper
{
    public static function Create(ReviewRequest $request)
    {
        $data = $request->validated();
        $review = new Review;

        $review->user_id = $data['user_id'];
        $review->solution_id = $data['solution_id'];
        $review->content = $data['content'];
        $review->rating = $data['rating'];

        if($review->save()):
            return redirect()->route('teacherCheckIndex')->with('msg', 'succesvol opgeslagen');
        else:
            return redirect()->back()->with('error', 'Er is iets mis gegaan');
        endif;
    }
}
