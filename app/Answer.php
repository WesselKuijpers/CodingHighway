<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function question()
    {
        $this->belongsTo('App\Question');
    }

    public function replies()
    {
        $this->hasMany('App\Reply');
    }
    protected $fillable = [
        'content', 'question_id'
    ];
}
