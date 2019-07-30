<?php

Route::get('/', 'MicropostsController@index'); // 上書き

// ユーザ登録 ログイン認証付きのルーティング
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::group(['prefix' => 'users/{id}'], function () { // 追加
        Route::post('follow', 'UserFollowController@store')->name('user.follow'); // 追加
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow'); // 追加
        Route::get('followings', 'UsersController@followings')->name('users.followings'); // 追加
        Route::get('followers', 'UsersController@followers')->name('users.followers'); // 追加
    });
    
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');