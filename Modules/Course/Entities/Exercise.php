<?php

namespace Modules\Course\Entities;

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
    return $this->belongsToMany(Media::class, 'exercise_media');
  }

  public function next()
  {
    return $this->belongsTo(Exercise::class, 'next_id');
  }

  public function solutions()
  {
      return $this->hasMany(Solution::class);
  }
}
