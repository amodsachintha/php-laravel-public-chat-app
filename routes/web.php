<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// TESTS

Route::get('/chatusers/all','ChatUserController@getAllChatUsers');
Route::get('/chatusers/store',function (){
    return view('addChatUser');
});
Route::get('/chatrooms/assoc',function (){
    return App\Chatroom::first()->associations()->first();
});

Route::post('/chatusers/store','ChatUserController@store');





