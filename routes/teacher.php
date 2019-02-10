<?php




Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('teacher.login');

Route::group(['middleware' => 'auth:teacher'], function() { 
    Route::get('/', function () {
        dd(auth()->guard('teacher')->user());       
    });
});