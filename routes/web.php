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

Route::get('/golf', function () {
    return view('top');
})->name("room.top");

Route::get('/golf/new', function () {
    return view('new');
})->name("room.new");

Route::post('/golf/new', 'App\Http\Controllers\RoomController@create')->name("room.create");

Route::get('/golf/join', function () {
    return view('join');
})->name("room.join");

Route::post('/golf/join', 'App\Http\Controllers\RoomController@join')->name("room.check");

Route::get('/golf/room/{id}', 'App\Http\Controllers\RoomController@into')->name("room.into");

Route::post('/golf/room/update', 'App\Http\Controllers\RoomPlayerController@update')->name("room.update");
    //Ajaxで実行するメソッドのルーティング
