<?php

namespace App;

use App\Models\course\Course;
use App\Models\course\Exercise;
use App\Models\course\Lesson;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
  protected $fillable = [
    'user_id',
    'course_id',
    'exercise_id',
    'lesson_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function course()
  {
    return $this->belongsTo(Course::class);
  }

  public function lesson()
  {
    return $this->belongsTo(Lesson::class);
  }

  public function exercise()
  {
    return $this->belongsTo(Exercise::class);
  }
}
