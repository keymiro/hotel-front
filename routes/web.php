<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/',[WelcomeController::class,'welcome']);

Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('/home',[loginController::class,'home'])->name('home');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
