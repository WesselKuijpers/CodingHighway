<?php

namespace App\models\course;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  public function level()
  {
    return $this->belongsTo(Level::class);
  }
}
