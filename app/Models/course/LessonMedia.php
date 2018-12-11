<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;
use App\Models\general\Media;


class LessonMedia extends Model
{
  protected $connection = 'mysql-course';

  public function lesson()
  {
    return $this->belongsTo(Lesson::class);
  }

  public function media()
  {
    return $this->belongsTo(Media::class);
  }
}
