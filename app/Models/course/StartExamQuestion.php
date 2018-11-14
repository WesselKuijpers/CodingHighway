<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;

class StartExamQuestion extends Model
{
    public function startExam()
    {
        return $this->belongsTo(startExam::class);
    }

    public function answers()
    {
        return $this->hasMany(StartExamAnswer::class);
    }
}
