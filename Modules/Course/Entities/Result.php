<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{


  public function level()
  {
    return $this->belongsTo(Level::class);
  }
}
