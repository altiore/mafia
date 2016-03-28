<?php

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', 'GameController@index');
    Route::post('/create', 'GameController@create');
    Route::get('/delete', 'GameController@destroy');

    Route::resource('/gamer', 'GamerController');
});
