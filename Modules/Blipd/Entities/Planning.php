<?php

namespace Modules\Blipd\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Planning extends Model
{
    protected $connection = 'mysql-blipd';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $dates = ['finished'];
}
