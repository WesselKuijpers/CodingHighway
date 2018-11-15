<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;

use App\Models\general\Media;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
  use SoftDeletes;

  public function exercises()
  {
    return $this->hasMany(Exercise::class);
  }

  public function lessons()
  {
    return $this->hasMany(Lesson::class);
  }

  public function media()
  {
    return $this->belongsTo(Media::class);
  }

  public function firstExercise()
  {
    return $this->hasOne(Exercise::class)->where('is_first', true);
  }

  public function firstLesson()
  {
    return $this->hasOne(Lesson::class)->where('is_first', true);
  }

  public function startExam()
  {
    return $this->hasOne(StartExam::class);
  }
}
