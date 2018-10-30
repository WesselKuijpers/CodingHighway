<?php

namespace App\Models\general;

use App\Models\invoice\Invoice;
use Illuminate\Database\Eloquent\Model;
use App\User;
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
    $output = '
      @import "../variables";

      $theme-colors: (
        "organisation": ' . $this->color . '
      );
      @import "~bootstrap/scss/bootstrap";
      
      .btn-oc { color: '.$this->fontcolor.' }
    ';

    Storage::disk('public')->put("css/organisations" . $this->id . ".scss", $output);
  }
}
