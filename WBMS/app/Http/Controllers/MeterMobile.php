<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MeterReader;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MeterMobile extends Controller
{
    //login page viewver
    public function View(){
        return view('Meter.login');
    }

    ///validat of user name and password
    public function loginValidate(Request $request){
       
        $validatedData = $request->validate([
            'username' => 'required|string',
            'PWD' => 'required|string',
        ]);

        $user = MeterReader::where('MTR_NIC', $request->input('username'))->first();

        if ($user && Hash::check($request->input('PWD'), $user->MTR_Pwd)) {
            Session::put('MTR_User',$user->id);
            Session::put('Org_id',$user->Org_id);
            return view('Meter.main');
        } else {
            return redirect()->back()->withInput($request->only('username'))->with('error', 'Invalid credentials');
        }
        // return view('Meter.main');
    }



    public function Calculatebill(){
        $customers = Customer::with(['accounts' => function ($query) {
                        $query->with('LastReading');
                    }])
                        ->get();

        return view('Meter.cal1',compact('customers'));
        // return view('Meter.cal1');
    }
    public function BillHistory(){
        return view('Meter.b-history');
    }
    public function PayHistory(){
        return view('Meter.p-history');
    }
    public function Pricing(){
        return view('Meter.bill');
    }
    
}
