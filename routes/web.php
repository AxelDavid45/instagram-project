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

//Route for home autogenerated
Route::get('/', 'HomeController@index')->name('home');
//Route configuration
Route::get('/configuration', 'UserController@configuration')->name('config');
//Group of routes for user stuffs
Route::group(['prefix' => 'user'], function () {
    Route::post('edit', 'UserController@edit')->name('user.edit');
    Route::get('avatar/{filename}', 'UserController@getImageProfile')->name('user.avatar');
});

//Route for show view create image
Route::get('/upload', 'ImageController@uploadForm')->name('image.form');
Route::post('/save', 'ImageController@saveImage')->name('image.save');
