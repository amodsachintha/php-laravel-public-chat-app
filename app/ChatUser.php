<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parse\ParseClient;

class ChatUser extends Model
{
    protected $fillable = [
      'name','avatar','about'
    ];


    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function chatrooms(){
        $this->belongsToMany('App\Chatroom');
    }

}
