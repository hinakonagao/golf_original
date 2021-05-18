<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('room', function(){
    return App\RoomPlayer::all();
});

Route::delete('room/{id}',function($id){

	$RoomPlayer = App\RoomPlayer::find($id);

	$RoomPlayer->delete();

	return response()->json([
        'success' => 'RoomPlayer deleted successfully!'
    ]);

});

Route::patch('room/{id}',function($id,Request $request){

	$RoomPlayer = App\RoomPlayer::find($id);

	$RoomPlayer->update($request->all());

	return response()->json([
        'success' => 'RoomPlayer updated successfully!'
    ],200);

});
