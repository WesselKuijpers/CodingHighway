<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


  public function questions()
  {
    $this->belongsToMany(Question::class, 'question_tags');
  }

  protected $fillable = [
    'name'
  ];
}
