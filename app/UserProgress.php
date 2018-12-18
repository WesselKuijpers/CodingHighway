<?php

namespace App;

use Modules\Course\Entities\Course;
use Modules\Course\Entities\Exercise;
use Modules\Course\Entities\Lesson;
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
