<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $fillable = [
        'chatroom_id','user_id'
    ];

    public function chatUsers(){
        return $this->belongsToMany('App\ChatUser');
    }
}
