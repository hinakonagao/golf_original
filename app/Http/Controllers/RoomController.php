<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPlayer;

class RoomController extends Controller
{
    //参加する
    public function join(Request $request){
        $name = $request->name;
        $password = $request->password;

        if(!Room::where('name', $name)->where('password', $password)->exists()){
            abort(404);
        }

        $room = Room::where('name', $name)->where('password', $password)->first();
        $room_id = $room->id;

        return redirect()->route('room.into', [ "id" => $room_id ]);
    }

    //作成する
    public function create(Request $request){
        $room = Room::create([
          'name' => $request->name,
          'password' => $request->password,
        ]);
        $room_id = $room->id;

        //RoomPlayerにデータを挿入する
        //1人目
        $room_player_1 = RoomPlayer::create([
            "name" => 'プレーヤー１',
            "room_id" => $room_id, //Roomから受け取ったid
            "user_id" => 1,
          ]);
          //2人目
          $room_player_2 = RoomPlayer::create([
            "name" => 'プレーヤー２',
            "room_id" => $room_id, //Roomから受け取ったid
            "user_id" => 2,
          ]);
          //3人目
          $room_player_3 = RoomPlayer::create([
            "name" => 'プレーヤー３',
            "room_id" => $room_id, //Roomから受け取ったid
            "user_id" => 3,
          ]);
          //4人目
          $room_player_4 = RoomPlayer::create([
            "name" => 'プレーヤー４',
            "room_id" => $room_id, //Roomから受け取ったid
            "user_id" => 4,
          ]);

        // 勉強メモ
        // $param = config('test');
        // $env = config('test.app_name');

        \Log::debug('ほげげ');
        \Log::debug($room_id);
        \Log::debug($room_player_1->id);

        return redirect()->route('room.into', [ "id" => $room_id ]);
    }

    //作成・参加どちらの場合も通る
    public function into($id){
      $room = Room::find($id);
        // \Log::debug($id);
        // \Log::debug($room);
      $room_players = RoomPlayer::where('room_id', '=', $id)->get();
        \Log::debug($room_players);
        // \Log::debug($room_players[0]->id);
      return view('room')->with([
        "room" => $room,
        "room_players" => $room_players
      ]);
    }
}
