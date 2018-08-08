<?php

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



Auth::routes();

Route::get('/', 'HomeController@index')->name('root_path');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('bot/on', 'BotController@on')->name('bot.on');

Route::resource('bot', 'BotController');
Route::prefix('{bot}')->group(function() {
    Route::resource('message', 'MessageController');
});
