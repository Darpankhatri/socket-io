<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushNotification;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/check', [IndexController::class, 'check_yes'])->name('check_yes');


Route::post('/save-token', [PushNotification::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [PushNotification::class, 'sendNotification'])->name('send.notification');


Route::group(['middleware' => 'auth'], function () {
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
    
});
Route::post('login',[IndexController::class,'login'])->name('login');