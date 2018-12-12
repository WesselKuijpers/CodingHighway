<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  protected $connection = 'mysql-course';

  public function level()
  {
    return $this->belongsTo(Level::class);
  }
}
