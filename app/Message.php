<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chatroom_id','user_id','content'
    ];

    protected $table = "messages";
    protected $primaryKey = "id";

    public function chatuser(){
        return $this->belongsTo('App\ChatUser');
    }

    public function chatroom(){
        return $this->belongsTo('App\Chatroom');
    }
}
