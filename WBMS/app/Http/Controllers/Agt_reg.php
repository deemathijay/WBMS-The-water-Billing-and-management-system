<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CusIdGenerator;
use App\Models\Agent;
use App\Models\Agents;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class Agt_reg extends Controller
{
    //
    public function register(Request $request)
    {
        $remark= $request->input('Agt_Remark');
        if ($remark=""){
            $remark="None";
        }
        $Org_id = Session::get('Org_id');

        $Agent = new Agents();
        $Agent->Agt_id = CusIdGenerator::generateAgtId();
        $Agent->Agt_FullName = $request->input('Agt_FullName');
        $Agent->Agt_NameInitials = $request->input('Agt_NameInitials');
        $Agent->Agt_Address = $request->input('Agt_Address');
        $Agent->Agt_NIC = $request->input('Agt_NIC');
        $Agent->Agt_Gender = $request->input('Agt_Gender');
        $Agent->Agt_Phone1 = $request->input('Agt_Phone1');
        $Agent->Agt_Phone2 = $request->input('Agt_Phone2');
        $Agent->Agt_DOB = $request->input('Agt_DOB');
        $Agent->Agt_Remark = $remark;
        $Agent->Org_id = $Org_id;
        $Agent->save();

        return view('page');
    }
}
