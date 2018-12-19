<?php

namespace Modules\Forum\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $fillable = [
    'content'
  ];

  public function answer()
  {
    return $this->belongsTo(Answer::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
