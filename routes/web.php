<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['namespace'=>'Backend','prefix'=>'backend','middleware'=>'auth'],function(){
    Route::get('/', 'BackendController@index')->name('backend');
    Route::get('/users', 'UsersController@index')->name('backend.users');

    Route::get('/shows', 'ShowsController@index')->name('backend.shows');
    Route::get('/shows/add', 'ShowsController@add')->name('backend.shows.add');
    Route::post('/shows/addOk', 'ShowsController@addOk')->name('backend.shows.addOk');
    Route::get('/shows/categories', 'ShowsController@categories')->name('backend.shows.categories');
    Route::get('/shows/review', 'ShowsController@review')->name('backend.shows.review');
    Route::get('/shows/addShows', 'ShowsController@addShows')->name('backend.shows.addShows');
    Route::get('/shows/edit/{id}', 'ShowsController@edit')->name('backend.shows.edit');
    Route::post('/shows/editOk', 'ShowsController@editOk')->name('backend.shows.editOk');
    Route::get('/shows/del/{id}', 'ShowsController@del')->name('backend.shows.del');

    Route::get('/users/review', 'UsersController@index')->name('backend.users.review');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('backend.users.edit');
    Route::post('/users/store', 'UsersController@store')->name('backend.users.store');
});
