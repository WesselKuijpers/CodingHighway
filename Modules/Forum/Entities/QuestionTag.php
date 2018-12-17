<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{


  public function question()
  {
    $this->belongsTo(Question::class);
  }

  public function tag()
  {
    $this->belongsTo(Tag::class);
  }
}
