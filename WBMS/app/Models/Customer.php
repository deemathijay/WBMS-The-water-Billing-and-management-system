<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function accounts()
    {
        return $this->hasMany(Cus_account::class, 'Cus_id');
    }
    protected $fillable = [
        'Cus_FullName', 
        'Cus_NameInitials',
        'Cus_Address',
        'Cus_NIC',
        'Cus_Gender',
        'Cus_Phone1',
        'Cus_Phone2',
        'Cus_DOB',
        'Cus_Remark',
    ];
}
