<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\contactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('mail',[contactController::class,'sendMail']);
// 4. set post route
Route::post('send/mail/data',[contactController::class,'send_mail_data'])->name('send.mail.data');
