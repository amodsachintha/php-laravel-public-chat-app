<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    protected $fillable = [
      'name','avatar','about'
    ];

    public function associations(){
        return $this->belongsToMany('App\Association');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

}
