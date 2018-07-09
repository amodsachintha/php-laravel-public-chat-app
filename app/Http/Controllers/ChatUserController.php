<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatUser;
use Illuminate\Http\Request;
use App\ChatUser;

class ChatUserController extends Controller
{

public function getAllChatUsers(){
    return ChatUser::all();
}

public function store(StoreChatUser $request){
    
    $chatUser = new ChatUser();
    $chatUser->name = $request->get('name');
    $chatUser->about = $request->get('about');
    $chatUser->avatar = $request->get('avatar');
    $chatUser->save();

    return redirect('/chatusers/store');
}

}
