<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;
use App\Models\general\Media;

class Lesson extends Model
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
    return $this->hasManyThrough(Media::class, LessonMedia::class);
  }

  public function next()
  {
    return $this->belongsTo(Lesson::class, 'next_id');
  }
}
