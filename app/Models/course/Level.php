<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
  public function exercises()
  {
    return $this->hasMany(Exercise::class);
  }

  public function lessons()
  {
    return $this->hasMany(Lesson::class);
  }
}
