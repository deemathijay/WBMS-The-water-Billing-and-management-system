<?php

use App\Http\Controllers\AddAccount;
use App\Http\Controllers\AddMeter;
use App\Http\Controllers\Agt_reg;
use App\Http\Controllers\Cus_reg;
use App\Http\Controllers\MeterMobile;
use App\Http\Controllers\MeterReadingApp;
use App\Http\Controllers\Payments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginValidation;
use App\Http\Controllers\MeterReader;
use App\Http\Controllers\OrgLogin\OrgLoginValidation;
use App\Http\Controllers\PageController;
use App\Http\Controllers\welcome;
use App\Http\Controllers\works;
use Faker\Provider\ar_EG\Payment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[welcome::class,'welcome']);
Route::post('/validate',[OrgLoginValidation::class,'Validation'])->name('Validate1');
Route::get('/pages/{pageName}', [PageController::class,'show'])->name('page');


// customer registrations
Route::post('/customer_registration',[Cus_reg::class,'register'])->name('Cus_reg');
Route::post('/paymen',[Cus_reg::class,'Installment'])->name('Installment');
Route::post('/payments',[Cus_reg::class,'payment'])->name('Cus_RegOneTimePay');
Route::get('/Customers-Account-list',[Cus_reg::class,'cusAccList'])->name('cusAccList');
Route::get('/Customers-list',[Cus_reg::class,'customerList'])->name('customerList');
Route::post('/payment',[Cus_reg::class,'AdditionalCharges'])->name('Cus_RegAdditionalCharges');
Route::post('/SearchForAddAccount',[AddAccount::class,('search')])->name('searchForAddAcc');
Route::get('/Customers-list/{id}',[Cus_reg::class,'editCusProfile'])->name('editCusProfile');
Route::post('/Edit-Customer-Details/{id}',[Cus_reg::class,'saveProfileChanges'])->name('saveProfileChanges');
Route::get('/Customers-profile/{id}',[Cus_reg::class,'viewCusProfile'])->name('viewCusProfile');
Route::get('/Customers-lAccount-Profile/{no}',[Cus_reg::class,'viewCusAcc'])->name('viewCusAcc');


///agent
Route::post('/Agent_registration',[Agt_reg::class,'register'])->name('Agt_reg');
Route::post('/Aget-RegPayments',[Agt_reg::class,'AgtReg_AdditionalChargers'])->name('AgtReg_AdditionalChargers');
Route::get('/agents-list',[Agt_reg::class,'Agt_list'])->name('Agt_list');
Route::get('/viewAgtProfile/{id}',[Agt_reg::class,'viewAgtProfile'])->name('viewAgtProfile');

// Route::post('/LoginValidation',[LoginValidation::class,'Validate1'])->name('Validate1');



///add existing usser to account
Route::get('/AddNewConnection/{customerId}',[AddAccount::class,'addAccount'])->name('AddNewConnection');




//routing for payment
Route::post('/paySearch',[Payments::class,'Search'])->name('SearchPay');


////meter mobile app
Route::get('/meter',[MeterMobile::class,'View'])->name('meterlogin');
Route::post('/meter/loginValidate',[MeterMobile::class,'loginValidate'])->name('MeterloginValidate');
Route::get('/meter/loginValidate/Calculatebill',[MeterMobile::class,'Calculatebill'])->name('Calculatebill');
Route::get('/meter/loginValidate/BillHistory',[MeterMobile::class,'BillHistory'])->name('BillHistory');
Route::get('/meter/loginValidate/PayHistory',[MeterMobile::class,'PayHistory'])->name('PayHistory');
Route::get('/meter/loginValidate/Pricing',[MeterMobile::class,'Pricing'])->name('Pricing');
Route::post('/meter/loginValidate/Calculatebill/SearchUserForBilling',[MeterReadingApp::class,'SearchUser'])->name('SearchUserForBilling');
Route::get('/meter/loginValidate/Calculatebill/SearchUserForBilling/MeterReadingCalculations/{id}',[MeterReadingApp::class,'Calculations'])->name('MeterReadingCalculations');
Route::get('/meter/loginValidate/Calculatebill/SearchUserForBilling/doCalculations',[MeterReadingApp::class,'doCalculations'])->name('MeterReadingdoCalculations');



///meter reader reg and admin interfaces
Route::post('/MTRregistration',[MeterReader::class,'Registration'])->name('MTRRegistration');
Route::get('/MTR_list',[MeterReader::class,'MTR_list'])->name('MTR_list');


///pricing
Route::get('/pricing', [PageController::class,'pricing'])->name('pricing');



///adding meeter readings
Route::get('/AddMeters',[AddMeter::class,'Search'])->name('MeterAddSearch');
Route::post('/AddMeters/SerachForAddMeter',[AddMeter::class,'SearchUser'])->name('SerachForAddMeter');
Route::post('/AddMeters/SerachForAddMeter/AddingMeterReading',[AddMeter::class,'AddingMeterReading'])->name('AddingMeterReading');


///logging out 
Route::get('/logingout',[OrgLoginValidation::class,'Logout'])->name('Logoutpage');
Route::get('/logingout/confirm',[OrgLoginValidation::class,'LogoutConfirm'])->name('LogoutConfirm');

