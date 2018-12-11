<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $connection = 'mysql-forum';

  public function user()
  {
    $this->belongsTo('App\User');
  }

  public function answer()
  {
    $this->belongsTo('App\Answer');
  }

  public function question()
  {
    $this->belongsTo('App\Question');
  }

  protected $fillable = [
    'increment', 'answer_id', 'question_id'
  ];
}
