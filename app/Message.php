<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chatroom_id','user_id','content'
    ];

    public function chatUser(){
        return $this->belongsTo('App\ChatUser');
    }

    public function chatroom(){
        return $this->belongsTo('App\Chatroom');
    }
}
