<?php

namespace Modules\Forum\Enteties;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $connection = 'mysql-forum';

  public function user()
  {
    $this->belongsTo(User::class);
  }

  public function answer()
  {
    $this->belongsTo(Answer::class);
  }

  public function question()
  {
    $this->belongsTo(Question::class);
  }

  protected $fillable = [
    'increment', 'answer_id', 'question_id'
  ];
}
