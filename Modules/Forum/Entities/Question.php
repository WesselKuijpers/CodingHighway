<?php

namespace Modules\Forum\Entities;

use App\User;
use Modules\Course\Entities\Exercise;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $fillable = [
    'title', 'content', 'exercise_id', 'solved'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public static function boot()
  {
    parent::boot();

    self::creating(function($model){
      $model->slug = str_slug($model->title, '-');
    });

    self::updating(function($model){
      $model->slug = str_slug($model->title, '-');
    });
  }

  public function user()
  {
    return  $this->belongsTo(User::class);
  }

  public function exercise()
  {
    return $this->belongsTo(Exercise::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'question_tags');
  }

  public function topic()
  {
    return $this->belongsTo(Topic::class);
  }

  public function answers()
  {
    return $this->hasMany(Answer::class);
  }
}
