<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CusIdGenerator;
use App\Models\Cus_account;
use App\Models\Cus_Installment;
use App\Models\reg_fee;
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


        //generate accnomber for first registration

        $CusAcc = new Cus_account();
        $CusAcc->CusAcc_No = CusIdGenerator::FirstAccount($customer->Cus_id);
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
        //error handling should come
    }

    public function payment(Request $request){
        $amount= $request->input('Reg_Fee');
        Session::put('amount',$amount);
        return view('Admin.cus_reg.additionalCharges');
    }

    public function Installment(Request $request){
        $install = new Cus_Installment();
        $install->Ins_Premium_amount=$request->input('premiumAmount');
        $install->Ins_NoOfPremium=$request->input('No_Installments');
        $install->Ins_NoOfRemain=$request->input('No_Installments');
        $install->CusAcc_id=Session::get('CusAcc_id');
        $install->save();
        Session::put('amount',0);
        return view('Admin.cus_reg.additionalCharges');
    }


    public function AdditionalCharges(Request $request){
        if(Session::get('amount')){
            $amount=Session::get('amount');
        }else{
            $amount = 0;
        }

        $total=$amount+$request->input('registrationFee')+$request->input('governmentTax')+$request->input('handlingCharges')+$request->input('otherCharges');
        $RegFee = new reg_fee();
        $RegFee->RegFee_Amount=$amount;
        $RegFee->RegFee_RegFee=$request->input('registrationFee');
        $RegFee->RegFee_GovTax=$request->input('governmentTax');
        $RegFee->RegFee_Handling=$request->input('handlingCharges');
        $RegFee->RegFee_Other=$request->input('otherCharges');
        $RegFee->RegFee_Total=$total;
        $RegFee->CusAcc_id=Session::get('CusAcc_id');
        $RegFee->save();

        $cusAccNo= Session::get('CusAcc_id');
        $customerId=Session::get('cus_id');
        $customer = Customer::findOrFail($customerId);
        $CusAccid = Cus_account::findOrFail($cusAccNo);
        
        return view('Admin.cus_reg.invoice',compact('customer','RegFee','CusAccid'));
    
    }

    public function customerList()
    {
        $customers = Customer::with('cusAccounts')->get();

        return view('Admin.pages.cus_list', compact('customers'));
    }

    
   
}
