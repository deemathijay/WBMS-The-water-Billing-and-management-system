<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cus_Installment extends Model
{
    use HasFactory;

    public function customerAccount()
    {
        return $this->belongsTo(Cus_account::class, 'id');
    }
}
