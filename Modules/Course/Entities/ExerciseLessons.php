<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class ExerciseLessons extends Model
{
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
