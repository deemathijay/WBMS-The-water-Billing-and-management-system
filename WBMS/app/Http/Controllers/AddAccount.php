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

        // Perform your search logic here using the $searchInput
        $customers = Customer::where('Cus_id', $searchInput)
                            ->orWhere('Cus_NIC', $searchInput)
                            ->get();

        return view('Admin.pages.addNewAcc', compact('customers'));
    }

    public function addAccount($customerId){

        $customer = Customer::find('$customerId');
        $oldAccount = Cus_account::where('Cus_id', $customerId)->latest()->first();
        $oldAccNumber = $oldAccount->CusAcc_no;
        $lastDigit = substr($oldAccNumber,-1);

        $newDigit = $lastDigit+1;
        $Cus_id = $customer->Cus_id;

        $Acc_id = 'V' . substr_replace($Cus_id, '', 0, $newDigit); 

        //this for existing users

        $CusAcc = new Cus_account();
        $CusAcc->CusAcc_No = $Acc_id;
        $CusAcc->CusAcc_Balance = 0;
        $CusAcc->CusAcc_Status = "Active" ;
        $CusAcc->CusAcc_InstallmentStatus = "No" ;
        $CusAcc->CusAcc_Remark = "No";
        $CusAcc->Cus_id = $customer->id;

        $CusAcc->save();

        if($customer){
            $CusAcc_id=$CusAcc->id;
            Session::put('CusAcc_id', $CusAcc_id);
            return view('Admin.cus_reg.cus_reg_payment');
        }
    }
}
