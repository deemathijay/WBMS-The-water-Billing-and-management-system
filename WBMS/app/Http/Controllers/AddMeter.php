<?php

namespace App\Http\Controllers;

use App\Models\Acc_LastReading;
use App\Models\Cus_account;
use App\Models\Customer;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddMeter extends Controller
{
    //
    public function Search (){
        $customers = Customer::with(['accounts' => function ($query) {
                                        $query->with('LastReading');
                                     }])->orderBy('created_at', 'desc')
                                ->get();

        return view('Admin.MeterReadings.Search',compact('customers'));
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

    public function AddingMeterReading(Request $request){

        // $request->validate([
        //     'LastMeter' => 'required', 
        //     'id' => 'required|exists:accounts,id',
        //     'Acc_id' => [
        //         'required',
        //         Rule::unique('acc_lastreadings')->where(function ($query) use ($request) {
        //             return $query->where('Acc_id', $request->input('id'));
        //         })
        //     ],
        // ]);


        $Org_id = Session::get('Org_id');
        $reading= $request->input('LastMeter');
        
        $newitem = new Acc_LastReading();
        $newitem->LastReading = $reading;
        $newitem -> Acc_id = $request->input('id');
        $newitem->Org_id = $Org_id;

        $newitem->save();

        
        return redirect()->action([AddMeter::class,'Search']);
        // $previousUrl = $request->input('previous_url');

        // return redirect($previousUrl);
    }
}
