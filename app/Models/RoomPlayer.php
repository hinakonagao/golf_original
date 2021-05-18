<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPlayer extends Model
{
    use HasFactory;

    // table名を指定
    protected $table = 'room_players';

    protected $guarded = ['id'];

    //親テーブルとの紐付け
    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
