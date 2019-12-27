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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/configuration', 'UserController@configuration')->name('config');
Route::group(['prefix' => 'user'], function () {
    Route::post('edit', 'UserController@edit')->name('user.edit');
    Route::get('avatar/{filename}', 'UserController@getImageProfile')->name('user.avatar');
});
