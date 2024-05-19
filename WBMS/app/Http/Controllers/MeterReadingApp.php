<?php

namespace App\Http\Controllers;

use App\Models\Acc_LastReading;
use App\Models\Acc_Types;
use App\Models\Cus_account;
use App\Models\Cus_Installment;
use App\Models\Customer;
use App\Models\Pricing_Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    ///search for account type
        $Gettype = Acc_Types::where('Acc_id',$Acc->id)->first();
        $type =$Gettype->Type;

    ///extracting pricing method
        $method = Pricing_Method::where('Org_id',Session::get('Org_id'))
                                ->where('Method',$type)
                                ->firstOrFail();


     ////calculate net units
        $netUnits = $request->input('NewReading') - $lastReadingTupple->LastReading;
        $netUnits = (float) number_format($netUnits, 2, '.', '');

    ///the master calculation

    $sum = 0;

    if ($netUnits <= 5.00) {
        $sum = $netUnits * $method['0_5'];
    } else {
        $sum += 5 * $method['0_5'];
    
        if ($netUnits <= 10.00) {
            $sum += ($netUnits - 5) * $method['6_10'];
        } else {
            $sum += 5 * $method['6_10'];
    
            if ($netUnits <= 15.00) {
                $sum += ($netUnits - 10) * $method['11_15'];
            } else {
                $sum += 5 * $method['11_15'];
    
                if ($netUnits <= 20.00) {
                    $sum += ($netUnits - 15) * $method['16_20'];
                } else {
                    $sum += 5 * $method['16_20'];
    
                    if ($netUnits <= 25.00) {
                        $sum += ($netUnits - 20) * $method['21_25'];
                    } else {
                        $sum += 5 * $method['21_25'];
    
                        if ($netUnits <= 30.00) {
                            $sum += ($netUnits - 25) * $method['26_30'];
                        } else {
                            $sum += 5 * $method['26_30'];
    
                            if ($netUnits <= 35.00) {
                                $sum += ($netUnits - 30) * $method['31_35'];
                            } else {
                                $sum += 5 * $method['31_35'];
    
                                if ($netUnits <= 40.00) {
                                    $sum += ($netUnits - 35) * $method['36_40'];
                                } else {
                                    $sum += 5 * $method['36_40'];
    
                                    if ($netUnits <= 45.00) {
                                        $sum += ($netUnits - 40) * $method['41_45'];
                                    } else {
                                        $sum += 5 * $method['41_45'];
    
                                        if ($netUnits <= 50.00) {
                                            $sum += ($netUnits - 45) * $method['46_50'];
                                        } else {
                                            $sum += 5 * $method['46_50'];
    
                                            if ($netUnits <= 60.00) {
                                                $sum += ($netUnits - 50) * $method['51_60'];
                                            } else {
                                                $sum += 10 * $method['51_60'];
    
                                                if ($netUnits <= 70.00) {
                                                    $sum += ($netUnits - 60) * $method['61_70'];
                                                } else {
                                                    $sum += 10 * $method['61_70'];
    
                                                    if ($netUnits <= 80.00) {
                                                        $sum += ($netUnits - 70) * $method['71_80'];
                                                    } else {
                                                        $sum += 10 * $method['71_80'];
    
                                                        if ($netUnits <= 90.00) {
                                                            $sum += ($netUnits - 80) * $method['81_90'];
                                                        } else {
                                                            $sum += 10 * $method['81_90'];
    
                                                            if ($netUnits <= 100.00) {
                                                                $sum += ($netUnits - 90) * $method['91_100'];
                                                            } else {
                                                                $sum += 10 * $method['91_100'];
    
                                                                // For units over 100
                                                                $sum += ($netUnits - 100) * $method['Over100'];
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    $sum = number_format($sum,2,'.','');
    
    ///CALCULATE if tax have
        $tax =($sum+$method['ServiceCharge']) * $method['GovTax']/100;
        $tax = number_format($tax,2,'.','');

        //convert bf amount
        if($Acc->CusAcc_Balance > 0 ){
            $BF = -1 *($Acc->CusAcc_Balance);
        }else{
            $BF= abs($Acc->CusAcc_Balance);
        }

    ///calculate if late pay -> interest
        if($Acc->CusAcc_Balance < 0){
        $interest= abs($Acc->CusAcc_Balance)* $method['Interest']/100;
        $discount = 0;
        $interest = number_format($interest,2,'.','');
        }else{
            ///if additional pay nam discount denawa
            $discount = abs($Acc->CusAcc_Balance)* $method['DiscountRate']/100;
            $interest = 0;
            $discount = number_format($discount,2,'.','');
        }

        
        ///calculate the total

        $total = $sum +  $method['ServiceCharge'] + $BF + $tax + $discount + $installmentAmount + $interest ; 
        $total = number_format($total,2,'.','');
        $CalculatedData=[
            'NewReading' =>$request->input('NewReading'),
            'LastReading'=> $lastReadingTupple->LastReading,
            'NetUnits' => $netUnits,
            'ChargeForUsedUnits' => $sum,
            'ServiceCharge' => $method['ServiceCharge'],
            'B/F'=> $BF,
            'Tax' => $tax,
            'Discount'=>$discount,
            'Installment'=>$installmentAmount,
            'Interest'=>$interest,
            'TotalAmount'=>$total,
            'AccNo'=> $Acc->id,
            'CusID'=>$customer->id,
        ];

        return view('Meter.cal2',compact('lastReadingTupple','Acc','customer','CalculatedData'));
    }
}
