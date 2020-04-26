<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// admin start
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function ($router){
    Route::get('/login', ['as' => 'admin.login','uses' => 'AuthController@login']);
    Route::post('/login', ['as' => 'admin.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/register', ['as' => 'admin.register','uses' => 'AuthController@register']);
    Route::post('/register', ['as' => 'admin.register.post','uses' => 'AuthController@postRegister']);

    // verification start
    Route::group(['middleware' => ['auth.admin:web']],function ($router){
        // member start
        Route::resource("member", 'MemberController');
        Route::get('member', 'MemberController@index')->name('member.index');
        Route::get('member/check/{id}/{status}', 'MemberController@check')->name('member.check');
        Route::get('member/edit/{id}', 'MemberController@edit')->name('member.edit');
        Route::get('member/destroy/{id}', 'MemberController@destroy')->name('member.destroy');
        Route::get('member/update/{id}', 'MemberController@update')->name('member.update');
        Route::get('member/create', 'MemberController@create')->name('member.create');
        // member end

        // channel start
        Route::resource("channel", 'ChannelController');
        Route::get('channel', 'ChannelController@index')->name('channel.index');
        Route::get('channel/check/{id}/{status}', 'ChannelController@check')->name('channel.check');
        Route::get('channel/edit/{id}', 'ChannelController@edit')->name('channel.edit');
        Route::get('channel/destroy/{id}', 'ChannelController@destroy')->name('channel.destroy');
        Route::get('channel/update/{id}', 'ChannelController@update')->name('channel.update');
        // channel end

        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    });
    // verification end

});
// admin end
