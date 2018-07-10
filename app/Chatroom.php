<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $fillable = [
        'cover_img','password','description','link','admin_id'
    ];

    protected $table = "chatrooms";


    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function chatusers(){
        return $this->belongsToMany('App\ChatUser','chatuser_chatroom','chatroom_id','chatuser_id');
    }
}

