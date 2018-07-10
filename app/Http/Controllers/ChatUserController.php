<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatUser;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\ChatUser;
use Illuminate\Support\Facades\Cookie;

class ChatUserController extends Controller
{

    public function getAllChatUsers()
    {
        return ChatUser::all();
    }

    public function store(StoreChatUser $request) // create
    {
        $chatUser = ChatUser::create([
            'name' => $request->get('name'),
            'about' => $request->get('about'),
            'avatar' => $request->get('avatar')
        ]);

        setcookie("chatuserid", $chatUser->id, time() + 86400, "/");

        return redirect('/chatusers/store')->with('status', 'User ' . $chatUser->name . ' added Successfully! You can login now!');
    }

    public function read($id) // read
    {
        return ChatUser::findOrFail($id);
    }

    public function update(Request $request) // update
    {
        $chatUser = ChatUser::findOrFail($request->cookie('chatuserid'));
        $changed = false;

        if (!is_null($request->get('name'))) {
            $chatUser->name = $request->get('name');
            $changed = true;
        }

        if (!is_null($request->get('about'))) {
            $chatUser->about = $request->get('about');
            $changed = true;
        }

        if (!is_null($request->get('avatar'))) {
            $chatUser->avatar = $request->get('avatar');
            $changed = true;
        }

        if ($changed)
            return back()->with('status', 'Changes applied! :)');
        else
            return back()->with('status', 'Nothing to Change! :/');

    }

    public function delete($id) //delete
    {
        ChatUser::findOrFail($id)->delete();
        return back()->with('status', 'success');
    }
}
