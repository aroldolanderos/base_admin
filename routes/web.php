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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/manager')->name('manager.')->group(function () {
    Route::get('publications', 'Manager\PublicationController@index')->name('publications.index');
    Route::post('publications', 'Manager\PublicationController@store')->name('publications.store');
    Route::get('publications/create', 'Manager\PublicationController@create')->name('publications.create');
    Route::get('publications/{id}', 'Manager\PublicationController@show')->name('publications.show');
    Route::put('publications/{id}', 'Manager\PublicationController@update')->name('publications.update');
    Route::delete('publications/{id}', 'Manager\PublicationController@delete')->name('publications.delete');
    Route::get('publications/{id}/edit', 'Manager\PublicationController@edit')->name('publications.edit');
    
});
