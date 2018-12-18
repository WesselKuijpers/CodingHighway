<?php

namespace Modules\Blipd\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Course\Entities\Lesson;

class LessonCard extends Model
{
    protected $connection = 'mysql-blipd';
    
    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
