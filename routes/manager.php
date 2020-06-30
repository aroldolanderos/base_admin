<?php

use App\Http\Controllers\Manager\HomeController;
use App\Http\Controllers\Manager\PublicationController;
use App\Http\Controllers\Manager\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Manager URLs
|
*/

Route::group(['middleware' => ['web']], function () {
    
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('permissions', 'PermissionController@index')->name('permissions.index');

Route::get('roles', 'RoleController@index')->name('roles.index');


Route::get('users', 'UserController@index')->name('users.index');
Route::post('users', 'UserController@store')->name('users.store');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::put('users/{id}', 'UserController@update')->name('users.update');
Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');


Route::get('publications', 'PublicationController@index')->name('publications.index');
Route::post('publications', 'PublicationController@store')->name('publications.store');
Route::get('publications/create', 'PublicationController@create')->name('publications.create');
Route::get('publications/{id}', 'PublicationController@show')->name('publications.show');
Route::put('publications/{id}', 'PublicationController@update')->name('publications.update');
Route::delete('publications/{id}', 'PublicationController@delete')->name('publications.delete');

//Route::group(['middleware' => ['permission:edit publications']], function () {
    Route::get('publications/{id}/edit', 'PublicationController@edit')->name('publications.edit');
//});

