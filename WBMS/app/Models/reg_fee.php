<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reg_fee extends Model
{
    use HasFactory;

    public function customerAccont()
    {
        return $this->belongsTo(Cus_account::class, 'id');
    }
}
