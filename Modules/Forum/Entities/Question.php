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

    self::created(function($model){
      $model->slug = str_slug($model->title, '-');
      $model->save();
    });

    self::updated(function($model){
      $model->slug = str_slug($model->title, '-');
      $model->save();
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

  public function answers()
  {
    return $this->hasMany(Answer::class);
  }
}
