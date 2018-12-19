<?php

namespace Modules\Forum\Entities;

use Modules\Course\Entities\Course;
use App\Models\General\Media;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

  public function course()
  {
    return $this->belongsTo(Course::class);
  }

  public function media()
  {
    return $this->belongsTo(Media::class);
  }

  public function questions()
  {
    return $this->hasMany(Question::class);
  }

}
