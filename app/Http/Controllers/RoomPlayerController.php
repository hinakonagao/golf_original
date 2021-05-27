<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPlayer;

class RoomPlayerController extends Controller
{
    //Ajaxで実行するメソッド
    public function update(Request $request){
        \DB::enableQueryLog();
        $id = $request->id;
        $column = $request->column;
        $data= $request->data;
        // \Log::debug($id);
        // \Log::debug($column);
        // \Log::debug($data);

        RoomPlayer::find($id)->update([
            $column => $data,
        ]);

        \Log::debug(\DB::getQueryLog());
    }
}
