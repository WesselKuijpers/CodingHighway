<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function exercise()
    {
        return $this->belongsTo('App\Models\course\Exercise');
    }
}
