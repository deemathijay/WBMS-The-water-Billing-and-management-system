<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class Cus_reg extends Controller
{
    //
    public function register(Request $request)
    {


        $customer = new Customer();
        $customer->Cus_id = CusIdGenerator('ge');
        $customer->Cus_FullName = $request->input('Cus_FullName');
        $customer->Cus_NameInitials = $request->input('Cus_NameInitials');
        $customer->Cus_Address = $request->input('Cus_Address');
        $customer->Cus_NIC = $request->input('Cus_NIC');
        $customer->Cus_Gender = $request->input('Cus_Gender');
        $customer->Cus_Phone1 = $request->input('Cus_Phone1');
        $customer->Cus_Phone2 = $request->input('Cus_Phone2');
        $customer->Cus_DOB = $request->input('Cus_DOB');
        $customer->Cus_Remark = $request->input('Cus_Remark');
        $customer->Org_id = 1; 
        $customer->save();

        return view('page');
    }
}
