<?php

namespace App\Http\Controllers;

use App\Models\Acc_LastReading;
use App\Models\Cus_account;
use App\Models\Cus_Installment;
use App\Models\Customer;
use Illuminate\Http\Request;

class MeterReadingApp extends Controller
{
    public function SearchUser(Request $request){
        $searchInput = $request->input('searchInput');
        $customers = Customer::where('Cus_id',$searchInput)
                                ->orWhere('Cus_NIC',$searchInput)
                                ->with(['accounts' => function ($query) {
                                        $query->with('LastReading');
                                     }])
                                ->get();
        return view('Meter.cal1',compact('customers'));
    }

    public function Calculations($id){
        $lastReadingTupple = Acc_LastReading::where('Acc_id',$id)->first();
        $Acc = Cus_account::findOrFail($id);
        $customer = Customer::findOrFail($Acc->Cus_id);
        if($lastReadingTupple && $Acc && $customer){
            return view('Meter.cal2',compact('lastReadingTupple','Acc','customer'));
        }
        // compact('lastReadingTuple')
    }

    public function doCalculations(Request $request){
        $Acc = Cus_account::findOrFail($request->input('AccountID'));
        $customer = Customer::findOrFail($request->input('CustomerID'));
        $lastReadingTupple = Acc_LastReading::where('Acc_id',$Acc->id)->first();

        ///search For Installment
        $Installment = Cus_Installment::where('CusAcc_id',$request->input('AccountID'))->first();
        if($Installment){
            if($Installment->Ins_NoOfRemain > 0){
                $installmentAmount = $Installment->Ins_Premium_amount;
            }else{
                $installmentAmount = 0;
            }
        }else{
                $installmentAmount = 0;
        }



     ////calculate net units
        $netUnits = $request->input('NewReading') - $lastReadingTupple->LastReading;
        $netUnits = (float) number_format($netUnits, 2, '.', '');


        $CalculatedData=[
            'NewReading' =>$request->input('NewReading'),
            'LastReading'=> $lastReadingTupple->LastReading,
            'NetUnits' => $netUnits,
            'ChargeForUsedUnits' => 100,
            'ServiceCharge' => 200,
            'B/F'=> $Acc->CusAcc_Balance,
            'Tax' => 300,
            'Discount'=>100,
            'Installment'=>$installmentAmount,
            'Interest'=>600,
            'TotalAmount'=>1000,
            'AccNo'=> $Acc->id,
            'CusID'=>$customer->id,
        ];

        return view('Meter.cal2',compact('lastReadingTupple','Acc','customer','CalculatedData'));
    }
}
