<?php

namespace Modules\Course\Entities;

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
    return $this->belongsToMany(Media::class, 'lesson_media');
  }

  public function next()
  {
    return $this->belongsTo(Lesson::class, 'next_id');
  }

  public function exercises()
  {
      return $this->belongsToMany(Exercise::class, 'exercise_lessons');
  }
}
