<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPlayer extends Model
{
    use HasFactory;

    protected $table = 'room_players';

    protected $guarded = ['id'];

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
