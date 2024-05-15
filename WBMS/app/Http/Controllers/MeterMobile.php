<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeterMobile extends Controller
{
    //login page viewver
    public function View(){
        return view('Meter.login');
    }
    public function loginValidate(){
        return view('Meter.main');
    }
    public function Calculatebill(){
        return view('Meter.cal1');
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
