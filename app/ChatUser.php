<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    protected $fillable = [
      'name','avatar','about'
    ];

    protected $table = "chatusers";
    protected $primaryKey = "id";

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function chatrooms(){
        return $this->belongsToMany('App\Chatroom','chatuser_chatroom','chatuser_id','chatroom_id');
    }



}
