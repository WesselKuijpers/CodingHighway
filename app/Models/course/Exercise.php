<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;
use App\Models\general\Media;

class Exercise extends Model
{
  public function course()
  {
    return $this->belongsTo(Course::class);
  }

  public function level()
  {
    return $this->belongsTo(Level::class);
  }

  public function media()
  {
    return $this->hasManyThrough(Media::class, ExerciseMedia::class);
  }

  public function next()
  {
    return $this->belongsTo(Exercise::class, 'next_exercise');
  }
}
