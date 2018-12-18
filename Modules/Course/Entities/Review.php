<?php

namespace Modules\Course\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{


    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
