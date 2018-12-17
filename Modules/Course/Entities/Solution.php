<?php

namespace Modules\Course\Entities;

use App\User;
use App\Models\general\Media;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function exercise()
  {
    return $this->belongsTo(Exercise::class);
  }

  public function media()
  {
    return $this->belongsToMany(Media::class, 'solution_media');
  }

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }
}
