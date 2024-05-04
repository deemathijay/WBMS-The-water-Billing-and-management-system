<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CusIdGenerator;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class Cus_reg extends Controller
{
    //
    public function register(Request $request)
    {
        $remark= $request->input('Cus_Remark');
        if ($remark=""){
            $remark="None";
        }
        $Org_id = Session::get('Org_id');

        $customer = new Customer();
        $customer->Cus_id = CusIdGenerator::generateCusId();
        $customer->Cus_FullName = $request->input('Cus_FullName');
        $customer->Cus_NameInitials = $request->input('Cus_NameInitials');
        $customer->Cus_Address = $request->input('Cus_Address');
        $customer->Cus_NIC = $request->input('Cus_NIC');
        $customer->Cus_Gender = $request->input('Cus_Gender');
        $customer->Cus_Phone1 = $request->input('Cus_Phone1');
        $customer->Cus_Phone2 = $request->input('Cus_Phone2');
        $customer->Cus_DOB = $request->input('Cus_DOB');
        $customer->Cus_Remark = $remark;
        $customer->Org_id = $Org_id;
        $customer->save();

        return view('Admin.pages.cus_reg_payment');
    }
}
