<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChatuserChatroom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatuser_chatroom', function (Blueprint $table) {
            $table->integer('id',true,true);
            $table->unsignedInteger('chatroom_id')->index();
            $table->foreign('chatroom_id')->references('id')->on('chatrooms')->onDelete('cascade');
            $table->unsignedInteger('chatuser_id')->index();
            $table->foreign('chatuser_id')->references('id')->on('chatusers')->onDelete('cascade');

            $table->engine='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatuser_chatroom');
    }
}
