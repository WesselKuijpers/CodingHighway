<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Model;
use App\User;

class License extends Model
{
  protected $connection = 'mysql-general';
  protected $table = 'codinghighway_general.licenses';

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function organisation()
  {
    return $this->belongsTo(Organisation::class);
  }
}
