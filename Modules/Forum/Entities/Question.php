<?php

namespace Modules\Forum\Enteties;

use App\User;
use Modules\Course\Entities\Exercise;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $connection = 'mysql-forum';

  public function user()
  {
    $this->belongsTo(User::class);
  }

  public function exercise()
  {
    $this->belongsTo(Exercise::class);
  }

  public function tags()
  {
    $this->belongsToMany(Tag::class, 'question_tags');
  }

  protected $fillable = [
    'title', 'content', 'exercise_id', 'solved'
  ];
}