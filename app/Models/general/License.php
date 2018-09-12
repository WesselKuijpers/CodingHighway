<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function organisation()
  {
    return $this->belongsTo(Organisation::class);
  }
}
