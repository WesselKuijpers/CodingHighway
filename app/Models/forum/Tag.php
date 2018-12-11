<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $connection = 'mysql-forum';

  public function questions()
  {
    $this->hasManyThrough('App\Question', 'App\QuestionTag');
  }

  protected $fillable = [
    'name'
  ];
}
