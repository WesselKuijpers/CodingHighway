<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class StartExam extends Model
{


  public function course()
  {
    return $this->belongsTo(Course::class);
  }

  public function questions()
  {
    return $this->hasMany(StartExamQuestion::class);
  }
}
