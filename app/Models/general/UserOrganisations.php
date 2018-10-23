<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Model;

class UserOrganisations extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function organisation()
  {
    return $this->belongsTo(Organisation::class);
  }
}
