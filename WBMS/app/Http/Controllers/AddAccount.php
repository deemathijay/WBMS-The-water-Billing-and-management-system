<?php

namespace App\Http\Controllers;

use App\Models\Cus_account;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddAccount extends Controller
{
    public function search(Request $request)
    {
        $searchInput = $request->input('searchInput');

        // Perform search logic here using the $searchInput
        $customers = Customer::where('Cus_id', $searchInput)
                            ->orWhere('Cus_NIC', $searchInput)
                            ->get();

        return view('Admin.pages.addNewAcc', compact('customers'));
    }
    //adding a account for existing user to system
    public function addAccount($customerId){

        $customer = Customer::find($customerId);
        $oldAccount = Cus_account::where('Cus_id', $customer->id)->latest()->first();

        $oldAccNumber = $oldAccount->CusAcc_No;
        $lastDigit = substr($oldAccNumber, -1);  // Extract the last digit correctly
        $intVal = intval($lastDigit);  // Convert the last digit to an integer
        $intVal ++;  // Increment the last digit by 2

        $Cus_id = $customer->Cus_id;
        $Acc_id = 'V' . substr($Cus_id, 1) . $intVal;  // Construct the new account ID

            // $Acc_id=$intVal;
        //this for existing users

        $CusAcc = new Cus_account();
        $CusAcc->CusAcc_No = $Acc_id;
        $CusAcc->CusAcc_Balance = 0;
        $CusAcc->CusAcc_Status = "Active" ;
        $CusAcc->CusAcc_InstallmentStatus = "No" ;
        $CusAcc->CusAcc_Remark = "No";
        $CusAcc->Org_id = Session::get('Org_id');
        $CusAcc->Cus_id = $customer->id;

        $CusAcc->save();

        if($customer){
            $CusAcc_id=$CusAcc->id;
            Session::forget('cus_id');
            Session::forget('CusAcc_id');
            Session::put('cus_id',$customer->id);
            Session::put('CusAcc_id', $CusAcc_id);
            return view('Admin.cus_reg.cus_reg_payment');
        }
    }
}
