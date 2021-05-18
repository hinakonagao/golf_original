<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPlayer;

class RoomPlayerController extends Controller
{
    //Ajaxで実行するメソッド
    public function update(Request $request){
        $data = $request->all();
        $id_1 = $data["room_players"][0]["id"];
        $id_2 = $data["room_players"][1]["id"];
        $id_3 = $data["room_players"][2]["id"];
        $id_4 = $data["room_players"][3]["id"];
        $player1 = $data["player1"];
        $player2 = $data["player2"];
        $player3 = $data["player3"];
        $player4 = $data["player4"];
        $p1_hole1 = $data["p1_hole1"];
        $p2_hole1 = $data["p2_hole1"];

        $target1 = RoomPlayer::find($id_1);
        $target1["name"] = $player1;
        $target1["hole_1"] = $p1_hole1;

        $target2 = RoomPlayer::find($id_2);
        $target2["name"] = $player2;
        $target2["hole_1"] = $p2_hole1;

        $target3 = RoomPlayer::find($id_3);
        $target3["name"] = $player3;
        $target3["hole_1"] = $p3_hole1;

        $target4 = RoomPlayer::find($id_4);
        $target4["name"] = $player4;
        $target4["hole_1"] = $p4_hole1;

        $target1->save();
        $target2->save();
        $target3->save();
        $target4->save();
    }

    public function methods(Request $request){
        \Log::debug("methods");
        $id = $request->id;
        $column = $request->column;
        $data= $request->data;
        \Log::debug($id);
        \Log::debug($column);
        \Log::debug($data);

        RoomPlayer::find($id)->update([
            $column => $data,
        ]);
    }
}
