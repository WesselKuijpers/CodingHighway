<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $connection = 'mysql-forum';

  public function answer()
  {
    $this->belongsTo('App\Answer');
  }

  protected $fillable = [
    'content'
  ];
}
