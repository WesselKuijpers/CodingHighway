<?php

namespace Modules\Forum\Entities;

use Modules\Course\Entities\Course;
use App\Models\General\Media;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  protected $fillable = [];

  public function course()
  {
    $this->belongsTo(Course::class);
  }

  public function media()
  {
    $this->belongsTo(Media::class);
  }

  public function questions()
  {
    $this->hasMany(Question::class);
  }

}
