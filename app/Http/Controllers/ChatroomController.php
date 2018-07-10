<?php

namespace App\Http\Controllers;

use App\Chatroom;
use App\Http\Requests\StoreChatroom;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    public function store(StoreChatroom $storeChatroomRequest)
    {

        $link = str_random(8);

        Chatroom::create([
            'password' => $storeChatroomRequest->get('password'),
            'admin_id' => $storeChatroomRequest->get('admin_id'),
            'cover_img' => 'default_cover.png',
            'description' => 'Testing',
            'link' => $link
        ]);
    }

    public function read($id)
    {
        return Chatroom::findOrFail($id);
    }

    public function delete($id)
    {
        return Chatroom::findOrFail($id)->delete();
    }

}
