<?php

namespace App\Models\general;

use App\Models\invoice\Invoice;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Organisation extends Model
{
  public function users()
  {
    return $this->hasManyThrough(User::class, UserOrganisation::class);
  }

  public function licenses()
  {
    return $this->hasMany(License::class);
  }

  public function media()
  {
    return $this->belongsTo(Media::class, 'image');
  }

  public function invoices()
  {
    return $this->hasMany(Invoice::class);
  }
}
