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

Route::get('flight22007/page1', 'App\Http\Controllers\ReservationController@page1');
Route::get('flight22007/page2', 'App\Http\Controllers\ReservationController@page2');
Route::get('flight22007/page3', 'App\Http\Controllers\ReservationController@page3');
Route::get('flight22007/page4', 'App\Http\Controllers\ReservationController@page4');
