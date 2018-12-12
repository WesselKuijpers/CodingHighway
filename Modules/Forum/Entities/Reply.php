<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $connection = 'mysql-forum';

  public function answer()
  {
    $this->belongsTo(Answer::class);
  }

  protected $fillable = [
    'content'
  ];
}
