<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Model;
use App\User;

class License extends Model
{
  protected $connection = 'mysql-general';
  protected $table = null;

  public function __construct()
  {
    parent::__construct();
    $this->table = env('DB_DATABASE_GENERAL').'.licenses';
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function organisation()
  {
    return $this->belongsTo(Organisation::class);
  }
}
