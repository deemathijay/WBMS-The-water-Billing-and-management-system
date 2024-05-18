<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cus_account extends Model
{
    use HasFactory;

    public function customer_Acc()
    {
        return $this->belongsTo(Customer::class, 'Cus_id');
    }

    public function LastReading(){
        return $this->hasOne(Acc_LastReading::class,'id');
    }
    // public function Installments()
    // {
    //     return $this->hasMany(Cus_Installment::class, 'id');
    // }

    // public function RegFees()
    // {
    //     return $this->hasMany(reg_fee::class, 'id');
    // }
}
