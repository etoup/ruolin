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
    Route::get('/projects/create','ProjectsController@create')->name('backend.projects.create');
    Route::post('/projects/created','ProjectsController@created')->name('backend.projects.created');

    Route::get('/regions', 'RegionsController@index')->name('backend.regions');
    Route::get('/regions/create', 'RegionsController@create')->name('backend.regions.create');
    Route::post('/regions/created', 'RegionsController@created')->name('backend.regions.created');
    Route::get('/regions/edit/{id}', 'RegionsController@edit')->name('backend.regions.edit');
    Route::delete('/regions/destroy/{id}', 'RegionsController@destroy')->name('backend.regions.destroy');
    Route::post('/regions/store', 'RegionsController@store')->name('backend.regions.store');
    Route::post('/regions/search', 'RegionsController@search')->name('backend.regions.search');

    Route::get('/industries','IndustriesController@index')->name('backend.industries');
    Route::get('/industries/create','IndustriesController@create')->name('backend.industries.create');
    Route::post('/industries/created','IndustriesController@created')->name('backend.industries.created');
    Route::get('/industries/edit/{id}', 'IndustriesController@edit')->name('backend.industries.edit');
    Route::delete('/industries/destroy/{id}', 'IndustriesController@destroy')->name('backend.industries.destroy');
    Route::post('/industries/store', 'IndustriesController@store')->name('backend.industries.store');
    Route::post('/industries/search', 'IndustriesController@search')->name('backend.industries.search');

    Route::get('/quotas','QuotasController@index')->name('backend.quotas');
    Route::get('/quotas/create','QuotasController@create')->name('backend.quotas.create');
    Route::post('/quotas/created','QuotasController@created')->name('backend.quotas.created');
    Route::get('/quotas/edit/{id}', 'QuotasController@edit')->name('backend.quotas.edit');
    Route::delete('/quotas/destroy/{id}', 'QuotasController@destroy')->name('backend.quotas.destroy');
    Route::post('/quotas/store', 'QuotasController@store')->name('backend.quotas.store');
    Route::post('/quotas/search', 'QuotasController@search')->name('backend.quotas.search');
});

