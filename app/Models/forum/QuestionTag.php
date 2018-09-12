<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{
    public function question()
    {
        $this->belongsTo('App\Question');
    }

    public function tag()
    {
        $this->belongsTo('App\Tag');
    }
}
