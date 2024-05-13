<?php

namespace App\Http\Controllers;

use App\Models\Cus_account;
use App\Models\Customer;
use Illuminate\Http\Request;

class Payments extends Controller
{
    //searching for accounts 
    public function Search(Request $request){
        $value = $request->input('searchInput');

        $accounts= Cus_account::where('CusAcc_No',$value)
                                ->get();
        $customers = Customer::where('Cus_id',$value)
                                ->orWhere('Cus_NIC',$value)
                                ->orWhere('Cus_Phone1',$value)
                                  ->get();
        if($accounts){
        return view('Admin.pages.payment_1',compact('accounts'));
        }   
        elseif($customers){
            return view('Admin.pages.payment_1',compact('customers'));
        }else{
            return view('Admin.pages.payment_1');
        }
    }
}
