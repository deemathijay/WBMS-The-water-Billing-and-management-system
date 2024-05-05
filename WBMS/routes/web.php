<?php

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
Route::post('/customer_registration',[Cus_reg::class,'register'])->name('Cus_reg');

Route::post('/Agent_registration',[Agt_reg::class,'register'])->name('Agt_reg');
// Route::post('/LoginValidation',[LoginValidation::class,'Validate1'])->name('Validate1');