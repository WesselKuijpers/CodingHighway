<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $connection = 'mysql-forum';

  public function questions()
  {
    $this->belongsToMany(Question::class, 'question_tags');
  }

  protected $fillable = [
    'name'
  ];
}
