<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{


  public function question()
  {
    return $this->belongsTo(Question::class);
  }

  public function tag()
  {
    return $this->belongsTo(Tag::class);
  }
}
