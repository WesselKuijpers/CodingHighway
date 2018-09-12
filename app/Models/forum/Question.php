<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function exercise()
    {
        $this->belongsTo('App\Exercise');
    }

    public function tags()
    {
        $this->hasManyThrough('App\Tag', 'App\QuestionTag');
    }


    protected $fillable = [
        'title', 'content', 'exercise_id', 'solved'
    ];
}
