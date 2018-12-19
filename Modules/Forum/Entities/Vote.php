<?php

namespace Modules\Forum\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $fillable = [
    'increment', 'answer_id', 'question_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function answer()
  {
    return $this->belongsTo(Answer::class);
  }

  public function question()
  {
    return $this->belongsTo(Question::class);
  }
}
