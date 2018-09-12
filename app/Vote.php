<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function answer()
    {
        $this->belongsTo('App\Answer');
    }

    public function question()
    {
        $this->belongsTo('App\Question');
    }

    protected $fillable = [
        'increment', 'answer_id', 'question_id'
    ];
}
