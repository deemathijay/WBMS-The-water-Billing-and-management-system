<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CusIdGenerator;
use App\Models\Agent;
use App\Models\Agent_Account;
use App\Models\Agents;
use App\Models\Agt_transaction;
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

        return view('Admin.agt_reg.additionalCharges',compact('Agent'));
    }

    public function AgtReg_AdditionalChargers(Request $request){

        $total = $request->input('registrationFee')+$request->input('governmentTax')+$request->input('handlingCharges')+$request->input('otherCharges');
        $remark = "Registration Fee = '$total'";
        $remarkPay ="Registration fee paid ";


        //account number genet=rating

        $account = Agents::find($request->input('Agent_id'));
        if($account){
            $accid= $account->Agt_id;
            $NewId = 'K'.substr($accid,1) . 0;

        

        //making agt account
            $AgtAcc = new Agent_Account();
            $AgtAcc->AgtAcc_No=$NewId;
            $AgtAcc->AgtAcc_Balance = 0;
            $AgtAcc->AgtAcc_Status ='Active';
            $AgtAcc->AgtAcc_Remark = 'None';
            $AgtAcc->Org_id = Session::get('Org_id');
            $AgtAcc->Agt_id = $request->input('Agent_id');
            $AgtAcc->save();


            $transaction1 = new Agt_transaction();
            $transaction1->AgtTrs_id = "still null";
            $transaction1->Agt_id = $request->input('Agent_id');
            $transaction1->AgtAcc_id = $AgtAcc->id;
            $transaction1->AgtTrs_remark = "REGISTRATION FEE DUE";
            $transaction1->AgtTrs_Amount= -$total;
            $transaction1->AgtTrs_Balance = -$total;
            $transaction1->Org_id = Session::get('Org_id');
            $transaction1->save();

            $transaction2 = new Agt_transaction();
            $transaction2->AgtTrs_id = "still null";
            $transaction2->Agt_id = $request->input('Agent_id');
            $transaction2->AgtAcc_id = $AgtAcc->id;
            $transaction2->AgtTrs_remark = "REGISTRATION FEE PAID";
            $transaction2->AgtTrs_Amount= +$total;
            $transaction2->AgtTrs_Balance= 0;
            $transaction2->Org_id = Session::get('Org_id');
            $transaction2->save();

        }
    }
    public function Agt_list(){
        $agents = Agents::all();

        return view ('Admin.pages.agt_list',compact('agents'));
    }

    ///view profile
    public function viewAgtProfile($id){

    
        $AgentAcc = Agent_Account::where('Agt_id', $id)->get()->first();
        $Agent =Agents::findOrFail($id);
        $Transactions = Agt_transaction::where('Agt_id',$id)->orderByDesc('id')->get();
        return view('Admin.agt_reg.agt_profile',compact('AgentAcc','Agent','Transactions'));

    }
}

