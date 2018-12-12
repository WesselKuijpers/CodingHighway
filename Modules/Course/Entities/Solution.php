<?php

namespace Modules\Course\Entities;

use App\User;
use App\Models\general\Media;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
  protected $connection = 'mysql-course';
  protected $table = null;

  public function __construct()
  {
    parent::__construct();
    $this->table = env('DB_DATABASE_COURSE').'.solutions';
  }

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
    return $this->belongsToMany(Media::class, env('DB_DATABASE_COURSE').'.solution_media');
  }

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }
}
