<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class StartExamQuestion extends Model
{


  public function startExam()
  {
    return $this->belongsTo(StartExam::class);
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
