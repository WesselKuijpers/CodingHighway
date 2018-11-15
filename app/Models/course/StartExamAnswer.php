<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;

class StartExamAnswer extends Model
{
    public function question()
    {
        return $this->belongsTo(StartExamQuestion::class);
    }
}
