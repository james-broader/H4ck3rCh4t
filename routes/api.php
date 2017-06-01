<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::post('users/register', 'UserController@register')->name('user.register');

    Route::post('messages/send', 'MessageController@send')->name('message.send');
    Route::get('messages/get/{id}', 'MessageController@get')->name('message.get');
});