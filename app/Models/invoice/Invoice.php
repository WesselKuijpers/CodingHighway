<?php

namespace App\Models\invoice;

use App\Models\general\Organisation;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{


  public function organisation()
  {
    return $this->belongsTo(Organisation::class);
  }

  public function InvoiceLines()
  {
    return $this->hasMany(InvoiceLine::class);
  }
}
