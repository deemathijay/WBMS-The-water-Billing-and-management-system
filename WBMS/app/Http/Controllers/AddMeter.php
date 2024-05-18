<?php

namespace App\Http\Controllers;

use App\Models\Acc_LastReading;
use App\Models\Cus_account;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddMeter extends Controller
{
    //
    public function Search (){
        return view('Admin.MeterReadings.Search');
    }
    public function SearchUser(Request $request){
        $searchInput = $request->input('searchInput');
        $customers = Customer::where('Cus_id',$searchInput)
                                ->orWhere('Cus_NIC',$searchInput)
                                ->with(['accounts' => function ($query) {
                                        $query->with('LastReading');
                                     }])
                                ->get();

        // $customers = Customer::where('Cus_NIC', $searchInput)
        //         ->orWhereHas('accounts', function($query) use ($searchInput) {
        //          $query->where('account_number', $searchInput);
        // })
        // ->with(['accounts' => function ($query) {
        //     $query->with('lastReading');
        // }])
        // ->get();
        return view('Admin.MeterReadings.Search',compact('customers'));
    }

    public function AddingMeterReading(Request $request,$id){
        $Org_id = Session::get('Org_id');
        $reading= $request->input('LastMeter');

        $newitem = new Acc_LastReading();
        $newitem->LastReading = $reading;
        $newitem -> Acc_id = $id;
        $newitem->Org_id = $Org_id;

        $newitem->save();

        

        $previousUrl = $request->input('previous_url');

        return redirect($previousUrl);
    }
}
