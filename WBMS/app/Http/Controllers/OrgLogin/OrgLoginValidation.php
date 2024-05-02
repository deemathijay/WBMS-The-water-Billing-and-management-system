<?php

namespace App\Http\Controllers\OrgLogin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Organization_details;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class OrgLoginValidation extends Controller
{
    public function Validation(Request $request){
        $Org_UserName = $request->input('Org_UserName');
        $Org_PWD = $request->input('Org_PWD');
        $user = Organization_details::where('Org_UserName', $Org_UserName)
                            ->where('Org_Password', $Org_PWD)
                            ->first();

        if($user){
            $Org_id=$user->id;
            Session::put('Org_id', $Org_id);
            return view('Admin.Main');
        }else{
            Session::flash('error', 'Incorrect username or password');
            return view('welcome');
        }
    }
}
