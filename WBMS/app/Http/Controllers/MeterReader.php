<?php

namespace App\Http\Controllers;

use App\Models\MeterReader as ModelsMeterReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MeterReader extends Controller
{
    //

    public function Registration(Request $request){
        $validater = Validator::make($request->all(),[
            'MTR_FullName' => 'required|string|max:255',
            'MTR_NameInitials' => 'required|string|max:255',
            'MTR_NIC' => 'required|string|max:12|unique:meter_readers,MTR_NIC',
            'MTR_Pwd' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'MTR_Phone1' => 'required|string|size:10|regex:/^0\d{9}$/',
            'MTR_Phone2' => 'nullable|string|size:10|regex:/^0\d{9}$/',
            'MTR_Address' => 'required|string',
            'MTR_Gender' => 'required|string|in:M,F',
            'MTR_DOB' => 'required|date',
            'MTR_Remark' => 'nullable|string',
        ]);

        if ($validater->fails()) {
            return redirect()->back()->withErrors($validater)->withInput();
        }
        $user = new ModelsMeterReader();
        $user->MTR_full_name = $request->input('MTR_FullName');
        $user->MTR_NameInitials = $request->input('MTR_NameInitials');
        $user->MTR_NIC = $request->input('MTR_NIC');
        $user->MTR_Pwd = Hash::make($request->input('MTR_Pwd'));
        $user->MTR_Phone1 = $request->input('MTR_Phone1');
        $user->MTR_Phone2 = $request->input('MTR_Phone2');
        $user->MTR_Address = $request->input('MTR_Address');
        $user->MTR_Gender = $request->input('MTR_Gender');
        $user->MTR_DOB = $request->input('MTR_DOB');
        $user->MTR_Remark = $request->input('MTR_Remark', 'None');
        $user->Org_id = Session::get('Org_id');

        $user->save();

        return view('Admin.Meter.RegComplete');
    }


    ////listing meeter readers

    public function MTR_list(){
        $agents = ModelsMeterReader::all();

        return view ('Admin.pages.MeterList',compact('agents'));
    }
}
