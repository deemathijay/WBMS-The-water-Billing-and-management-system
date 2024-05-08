<?php

use App\Http\Controllers\AddAccount;
use App\Http\Controllers\Agt_reg;
use App\Http\Controllers\Cus_reg;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginValidation;
use App\Http\Controllers\OrgLogin\OrgLoginValidation;
use App\Http\Controllers\PageController;
use App\Http\Controllers\welcome;
use App\Http\Controllers\works;

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
Route::get('/Customers-list',[Cus_reg::class,'customerList'])->name('customerList');
Route::post('/payment',[Cus_reg::class,'AdditionalCharges'])->name('Cus_RegAdditionalCharges');
Route::post('/SearchForAddAccount',[AddAccount::class,('search')])->name('searchForAddAcc');


Route::post('/Agent_registration',[Agt_reg::class,'register'])->name('Agt_reg');
// Route::post('/LoginValidation',[LoginValidation::class,'Validate1'])->name('Validate1');



///add existing usser to account
Route::get('/AddNewConnection',[AddAccount::class,'addAccount'])->name('AddNewConnection');