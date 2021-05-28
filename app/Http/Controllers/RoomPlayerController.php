<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPlayer;

class RoomPlayerController extends Controller
{
    //Ajaxで実行するメソッド
    public function update(Request $request){

        $id = $request->id;
        $column = $request->column;
        $data= $request->data;

        RoomPlayer::find($id)->update([
          $column => $data,
        ]);
    }
}
