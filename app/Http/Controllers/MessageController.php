<?php

namespace App\Http\Controllers;

use App\ChatUser;
use App\Http\Requests\StoreMessage;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(StoreMessage $storeMessageRequest)
    {
        $msg = Message::create([
            'chatroom_id' => $storeMessageRequest->get('chatroom_id'),
            'user_id' => $storeMessageRequest->get('user_id'),
            'content' => $storeMessageRequest->get('content')
        ]);

//        $msg = Message::find(13);
        $user = ChatUser::find($msg->user_id);

        return response()->json([$msg,$user]);

    }

    public function read($id){
        return Message::findOrFail($id);
    }

    public function delete($id){
        $message = Message::findOrFail($id);
        $message->content = "<i>This message has been deleted</i>";
        $message->save();
    }


}
