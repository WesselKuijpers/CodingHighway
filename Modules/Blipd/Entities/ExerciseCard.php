<?php

namespace Modules\Blipd\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Course\Entities\Exercise;

class ExerciseCard extends Model
{
    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
