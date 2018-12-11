<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $connection = 'mysql-course';

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
