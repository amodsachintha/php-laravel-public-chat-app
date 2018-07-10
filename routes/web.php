<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// TESTS

Route::get('/chatusers/all', 'ChatUserController@getAllChatUsers');
Route::get('/chatusers/store', function () {
    return view('addChatUser');
});
Route::get('/chatrooms/assoc', function () {
    $chatroom = App\Chatroom::find(1);

    echo "<code>";
    foreach ($chatroom->chatusers as $user) {
        echo $user . "</br>";
    }
    echo "</code>";

});

Route::post('/chatusers/store', 'ChatUserController@store');


Route::get('/chatrooms/messages/{id}', function ($id) {
    $messages = App\Chatroom::findOrFail(intval($id))->messages;
    foreach ($messages as $message) {
        echo "<kbd>".App\ChatUser::findOrFail(intval($message->user_id))->name."</kbd> - <code>".$message->content."</code></br>";
    }
});

Route::get('/chat',function (){

    $chatroom = new App\Chatroom([
        'password' => '1234',
        'admin_id' => 2,
        'cover_img' => 'default_cover.png',
        'description' => 'Testing',
        'link' => str_random(8)
    ]);

   return view('chat',['id'=>1,'title'=>$chatroom->description]);
});


Route::post('/chat/endpoint', 'MessageController@store');

