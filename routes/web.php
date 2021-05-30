<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/adminhome', [App\Http\Controllers\AdminController::class, 'index']);
Route::post('/storeland', [App\Http\Controllers\AdminController::class, 'store']);
Route::get('/delete/{id}',[App\Http\Controllers\AdminController::class, 'destroy']);
Route::get('/edit/{id}',[App\Http\Controllers\AdminController::class, 'edit']);
Route::post('/update',[App\Http\Controllers\AdminController::class, 'update']);


Route::get('/message',[App\Http\Controllers\MessagesController::class, 'chat']);
Route::post('/message/store',[App\Http\Controllers\MessagesController::class, 'store']);


Route::get('/book/{id}',[App\Http\Controllers\BookingController::class, 'book']);