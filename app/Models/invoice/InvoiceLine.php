<?php

namespace App\Models\invoice;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
  protected $connection = 'mysql-general';

  public function invoice()
  {
    return $this->belongsTo(Invoice::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
