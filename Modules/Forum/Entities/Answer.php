<?php

namespace Modules\Forum\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $connection = 'mysql-forum';

  public function user()
  {
    $this->belongsTo(User::class);
  }

  public function question()
  {
    $this->belongsTo(Question::class);
  }

  public function replies()
  {
    $this->hasMany(Reply::class);
  }

  protected $fillable = [
    'content', 'question_id'
  ];
}
