<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($pageName)
    {
        switch ($pageName) {
            case 'cus_reg':
                return view('Admin.pages.cus_reg');
            case 'default':
                return view('Admin.pages.default');
            case 'agt_reg':
                return view('Admin.pages.agt_reg');
            case 'cus_list':
                return view('Admin.pages.cus_list');
            case 'cusAccList':
                return view('Admin.pages.cusAccList');
            case 'payment_1':
                return view('Admin.pages.payment_1');
            case 'pay_list':
                return view('Admin.pages.pay_list');
            case 'cus_profile':
                return view('Admin.pages.cus_profile');   
            case 'addNewAcc':
                return view('Admin.pages.addNewAcc');
            case 'Agt_list':
                return view('Admin.pages.agt_list');
            case 'AddMeterReader':
                return view('Admin.pages.AddMeterReader');
                


            default:
                return abort(404); // Page not found
        }
    }

    public function pricing(){
        return view ('Admin.pages.pricing');
    }
}
