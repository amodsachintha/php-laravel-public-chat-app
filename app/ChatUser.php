<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    protected $fillable = [
      'name','avatar','about'
    ];


    public function messages(){
        return $this->hasMany('App\Message');
    }

}
