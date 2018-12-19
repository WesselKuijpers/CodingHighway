<?php

namespace Modules\Forum\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $fillable = [
    'content', 'question_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function question()
  {
    return $this->belongsTo(Question::class);
  }

  public function replies()
  {
    return $this->hasMany(Reply::class);
  }

}
