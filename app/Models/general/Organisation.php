<?php

namespace App\Models\general;

use App\User;
use OrganisationStyleHelper;
use App\Models\invoice\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Organisation extends Model
{

  public function users()
  {
    return $this->belongsToMany(User::class, 'licenses');
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

  public function CompileTheme()
  {
    $output = OrganisationStyleHelper::load($this->color);
    Storage::disk('css')->put("organisations/organisation" . $this->id . ".css", $output);
  }
}
