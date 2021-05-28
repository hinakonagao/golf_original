<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPlayer;

class RoomController extends Controller
{
    //作成者の処理
    public function create(Request $request) {

        $name = $request->name;

        if (Room::where('name', $name)->exists()) {
          return redirect()->route('room.create')->with('message', 'このゲーム名は既に使用されています');
        }

        $room = Room::create([
          'name' => $name,
          'password' => $request->password,
        ]);
        $room_id = $room->id;

        //RoomPlayerにデータを挿入する
        //1人目
        $room_player_1 = RoomPlayer::create([
          "name" => '名前を入力',
          "room_id" => $room_id, //Roomから受け取ったid
          "user_id" => 1,
        ]);
        //2人目
        $room_player_2 = RoomPlayer::create([
          "name" => '名前を入力',
          "room_id" => $room_id,
          "user_id" => 2,
        ]);
        //3人目
        $room_player_3 = RoomPlayer::create([
          "name" => '名前を入力',
          "room_id" => $room_id,
          "user_id" => 3,
        ]);
        //4人目
        $room_player_4 = RoomPlayer::create([
          "name" => '名前を入力',
          "room_id" => $room_id,
          "user_id" => 4,
        ]);

        return redirect()->route('room.into', [ "id" => $room_id ]);
    }

    //参加者の処理
    public function join(Request $request){

        $name = $request->name;
        $password = $request->password;

        if (!Room::where('name', $name)->where('password', $password)->exists()) {
          return redirect()->route('room.join')->with('message', 'ゲーム名またはパスワードが一致しません');
        }

        $room = Room::where('name', $name)->where('password', $password)->first();
        $room_id = $room->id;

        return redirect()->route('room.into', [ "id" => $room_id ]);
  }

    //作成者・参加者のどちらも通る処理
    public function into($id){

        $room = Room::find($id);
        $room_players = RoomPlayer::where('room_id', '=', $id)->get();

        return view('room')->with([
          "room" => $room,
          "room_players" => $room_players
        ]);
    }
}
