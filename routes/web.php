<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushNotification;
use App\Http\Controllers\MessageController;
use Symfony\Component\Mime\MessageConverter;
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
Route::get('/chat-app', function () {
    return view('web.pages.sample');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/save-token', [PushNotification::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [PushNotification::class, 'sendNotification'])->name('send.notification');

Route::get('my-chat',[MessageController::class,'my_chat'])->name('my.chat');
Route::get('logout',[HomeController::class,'logout'])->name('logout');
Route::post('login',[IndexController::class,'login'])->name('login');
