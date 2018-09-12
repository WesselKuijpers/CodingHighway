<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function questions()
    {
        $this->hasManyThrough('App\Question', 'App\QuestionTag');
    }

    protected $fillable = [
        'name'
    ];
}