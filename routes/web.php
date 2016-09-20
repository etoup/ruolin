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
    Route::post('/users/search', 'UsersController@search')->name('backend.users.search');
    Route::get('/users/review', 'UsersController@index')->name('backend.users.review');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('backend.users.edit');
    Route::post('/users/store', 'UsersController@store')->name('backend.users.store');
    Route::delete('/users/destroy/{id}', 'UsersController@destroy')->name('backend.users.destroy');
    Route::get('/projects', 'ProjectsController@index')->name('backend.projects');
    Route::get('/regions', 'RegionsController@index')->name('backend.regions');
    Route::get('/regions/create', 'RegionsController@create')->name('backend.regions.create');
    Route::post('/regions/created', 'RegionsController@created')->name('backend.regions.created');

});

