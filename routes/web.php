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


