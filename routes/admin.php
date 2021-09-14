
<?php

Route::get('/admin', function () {
    return 'welcome to admin page';
});


Route:: namespace('Front')->group(function(){
//     Route::get('users','UserController@showUserName');
});

Route::group(['prefix'=>'users','middleware'=>'auth'], function(){
    Route::get('/', function () {
        return 'welcome';
    });



});


Route::get('showuser','Front\UserController@showUserName');
Route::get('showuser1','Front\UserController@showUserName1');
Route::get('showuser2','Front\UserController@showUserName2');
Route::get('main','Front\UserController@getData');

