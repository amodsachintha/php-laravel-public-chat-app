<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $fillable = [
        'cover_img','password','description','link','admin_id'
    ];

    public function associations(){
        return $this->belongsToMany('App\Association');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }
}
