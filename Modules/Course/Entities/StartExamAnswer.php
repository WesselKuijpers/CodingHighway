<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class StartExamAnswer extends Model
{
  protected $connection = 'mysql-course';

  public function question()
  {
    return $this->belongsTo(StartExamQuestion::class);
  }
}
