<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;

use App\Models\general\Media;

class Course extends Model
{
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
}
