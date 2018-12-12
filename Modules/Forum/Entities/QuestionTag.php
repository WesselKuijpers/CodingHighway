<?php

namespace Modules\Forum\Enteties;

use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{
  protected $connection = 'mysql-forum';

  public function question()
  {
    $this->belongsTo(Question::class);
  }

  public function tag()
  {
    $this->belongsTo(Tag::class);
  }
}
