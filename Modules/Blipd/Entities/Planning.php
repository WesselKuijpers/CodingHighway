<?php

namespace Modules\Blipd\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Planning extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(LessonCard::class);
    }

    public function exercises()
    {
        return $this->hasMany(ExerciseCard::class);
    }

    protected $dates = ['finished'];
}
