<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_players', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger("room_id")->comment('Roomテーブルのid');
            //外部キー制約
            $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms')
                    ->onDelete('cascade');
            $table->integer("user_id")->nullable()->comment('ユーザーID');
            $table->string("name")->nullable()->comment('プレイヤー名');
            $table->integer("hole_1")->nullable()->comment('ホールのスコア1');
            $table->integer("hole_2")->nullable()->comment('ホールのスコア2');
            $table->integer("hole_3")->nullable()->comment('ホールのスコア3');
            $table->integer("hole_4")->nullable()->comment('ホールのスコア4');
            $table->integer("hole_5")->nullable()->comment('ホールのスコア5');
            $table->integer("hole_6")->nullable()->comment('ホールのスコア6');
            $table->integer("hole_7")->nullable()->comment('ホールのスコア7');
            $table->integer("hole_8")->nullable()->comment('ホールのスコア8');
            $table->integer("hole_9")->nullable()->comment('ホールのスコア9');
            $table->integer("hole_10")->nullable()->comment('ホールのスコア10');
            $table->integer("hole_11")->nullable()->comment('ホールのスコア11');
            $table->integer("hole_12")->nullable()->comment('ホールのスコア12');
            $table->integer("hole_13")->nullable()->comment('ホールのスコア13');
            $table->integer("hole_14")->nullable()->comment('ホールのスコア14');
            $table->integer("hole_15")->nullable()->comment('ホールのスコア15');
            $table->integer("hole_16")->nullable()->comment('ホールのスコア16');
            $table->integer("hole_17")->nullable()->comment('ホールのスコア17');
            $table->integer("hole_18")->nullable()->comment('ホールのスコア18');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_players');
    }
}
