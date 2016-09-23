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
    //路演路演
    Route::get('/shows', 'ShowsController@index')->name('backend.shows');
    Route::get('/shows/add', 'ShowsController@add')->name('backend.shows.add');
    Route::post('/shows/addCate', 'ShowsController@addCate')->name('backend.shows.addCate');
    Route::get('/shows/editCate/{id}', 'ShowsController@editCate')->name('backend.shows.editCate');
    Route::post('/shows/editCateOk', 'ShowsController@editCateOk')->name('backend.shows.editCateOk');
    Route::delete('/shows/delCate/{id}', 'ShowsController@delCate')->name('backend.shows.delCate');
    Route::post('/shows/addOk', 'ShowsController@addOk')->name('backend.shows.addOk');
    Route::get('/shows/categories', 'ShowsController@categories')->name('backend.shows.categories');

    Route::get('/shows/review', 'ShowsController@review')->name('backend.shows.review');
    Route::get('/shows/addShows', 'ShowsController@addShows')->name('backend.shows.addShows');
    Route::get('/shows/edit/{id}', 'ShowsController@edit')->name('backend.shows.edit');
    Route::post('/shows/editOk', 'ShowsController@editOk')->name('backend.shows.editOk');
    Route::delete('/shows/del/{id}', 'ShowsController@del')->name('backend.shows.del');
    Route::get('/shows/review/{id}', 'ShowsController@review')->name('backend.shows.review');

    //联董路由
    Route::get('/Cochairman', 'CochairmanController@index')->name('backend.Cochairman');
    Route::get('/Cochairman/add', 'CochairmanController@add')->name('backend.Cochairman.add');
    Route::post('/Cochairman/addOk', 'CochairmanController@addOk')->name('backend.Cochairman.addOk');
    Route::get('/Cochairman/review', 'CochairmanController@review')->name('backend.Cochairman.review');
    Route::get('/Cochairman/reviewOk/id/{id}/review/{review}', 'CochairmanController@reviewOk')->name('backend.Cochairman.reviewOk');
    Route::get('/Cochairman/addCochairman', 'CochairmanController@addCochairman')->name('backend.Cochairman.addCochairman');
    Route::get('/Cochairman/edit/{id}', 'CochairmanController@edit')->name('backend.Cochairman.edit');
    Route::post('/Cochairman/editOk', 'CochairmanController@editOk')->name('backend.Cochairman.editOk');
    Route::delete('/Cochairman/del/{id}', 'CochairmanController@del')->name('backend.Cochairman.del');
    Route::delete('/Cochairman/destroy/{id}', 'CochairmanController@destroy')->name('backend.Cochairman.destroy');

    Route::get('/projects', 'ProjectsController@index')->name('backend.projects');
    Route::get('/projects/create','ProjectsController@create')->name('backend.projects.create');
    Route::post('/projects/created','ProjectsController@created')->name('backend.projects.created');
    Route::get('/projects/edit/{id}','ProjectsController@edit')->name('backend.projects.edit');
    Route::delete('/projects/destroy/{id}','ProjectsController@destroy')->name('backend.projects.destroy');
    Route::post('/projects/store','ProjectsController@store')->name('backend.projects.store');
    Route::post('/projects/search','ProjectsController@search')->name('backend.projects.search');

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
