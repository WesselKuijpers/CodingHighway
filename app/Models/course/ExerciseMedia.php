<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;
use App\Models\general\Media;

class ExerciseMedia extends Model
{
  public function exercise()
  {
    return $this->belongsTo(Exercise::class);
  }

  public function media()
  {
    return $this->belongsTo(Media::class);
  }
}
