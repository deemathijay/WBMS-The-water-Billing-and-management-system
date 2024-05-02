<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CusIdGenerator extends Controller
{
    function generateCusId() {
        $year = date('y');
        $Org_id = Session::get('Org_id');
        
        $LastId = Customer::latest()->value('id');
        $NewId =$LastId+1;
        $Org_id_pad = str_pad($Org_id, 3, '0', STR_PAD_LEFT);

        $id_pad = str_pad($NewId, 6, '0', STR_PAD_LEFT);
        $Cus_id = 'C' . $year . $Org_id_pad . $id_pad;
    
        return $Cus_id;
    }
}
