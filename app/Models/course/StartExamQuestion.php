<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Model;

class StartExamQuestion extends Model
{
  protected $connection = 'mysql-course';

  public function startExam()
  {
    return $this->belongsTo(startExam::class);
  }

  public function answers()
  {
    return $this->hasMany(StartExamAnswer::class, 'question_id');
  }

  public function correctAnswer()
  {
    return $this->hasOne(StartExamAnswer::class, 'question_id')->where('id', $this->correct_answer_id);
  }
}
