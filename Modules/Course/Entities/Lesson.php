<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\general\Media;

class Lesson extends Model
{
  protected $connection = 'mysql-course';

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
    return $this->belongsToMany(Media::class, 'codinghighway_course.lesson_media');
  }

  public function next()
  {
    return $this->belongsTo(Lesson::class, 'next_id');
  }

  public function exercises()
  {
      return $this->belongsToMany(Exercise::class, 'codinghighway_course.exercise_lessons');
  }
}
