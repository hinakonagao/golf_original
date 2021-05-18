<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;  //デフォルト

    // table名を指定
    protected $table = 'rooms';

    protected $fillable = ['name', 'password'];

    //従テーブルとの紐付け
    public function roomplayer(){
        return $this->hasMany('App\Models\RoomPlayer');
          //$this->hasMany(参照先モデル)とすることで、従テーブルのデータを参照できるようにする
    }
}
