<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
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
Route::get('logout',[LoginController::class,'logout'])->name('logout');

Route::get('home',[HotelController::class,'index'])->name('home');
Route::get('create/hotel',[HotelController::class,'create'])->name('create.hotel');
Route::post('store/hotel',[HotelController::class,'store'])->name('store.hotel');
Route::get('edit/{id}/hotel',[HotelController::class,'edit'])->name('edit.hotel');
Route::put('update/{id}/hotel',[HotelController::class,'update'])->name('update.hotel');
Route::delete('detele/{id}/hotel',[HotelController::class,'destroy'])->name('delete.hotel');
Route::get('showWithRooms/{id}/hotel',[HotelController::class,'showWithRooms'])->name('showWithRooms.hotel');

Route::get('create/room/{id}/hotel',[RoomController::class,'create'])->name('create.room');
Route::post('store/room',[RoomController::class,'store'])->name('store.room');
Route::get('edit/{id}/room',[RoomController::class,'edit'])->name('edit.room');
Route::put('update/{id}/room',[RoomController::class,'update'])->name('update.room');
Route::delete('detele/{id}/room',[RoomController::class,'destroy'])->name('delete.room');


