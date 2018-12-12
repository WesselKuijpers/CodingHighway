<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\general\Media;

class ExerciseMedia extends Model
{
  protected $connection = 'mysql-course';

  public function exercise()
  {
    return $this->belongsTo(Exercise::class);
  }

  public function media()
  {
    return $this->belongsTo(Media::class);
  }
}