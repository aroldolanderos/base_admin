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



Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Authorization access for Roles && Permissions
|--------------------------------------------------------------------------
*/

// ...
Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('permissions', 'PermissionController@index')->name('permissions.index');
    Route::get('roles', 'RoleController@index')->name('roles.index');
});





/*
|--------------------------------------------------------------------------
| Authorization access for users
|--------------------------------------------------------------------------
*/

// Read users
Route::group(['middleware' => ['permission:read users']], function () {
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('publications/{id}', 'PublicationController@show')->name('publications.show');
});

// Create users
Route::group(['middleware' => ['permission:create users']], function () {
    Route::post('users', 'UserController@store')->name('users.store');
    Route::get('users/create', 'UserController@create')->name('users.create');
});

// Update users
Route::group(['middleware' => ['permission:update users']], function () {
    Route::put('users/{id}', 'UserController@update')->name('users.update');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
});

// Delete users

// Enable/disable users



/*
|--------------------------------------------------------------------------
| Authorization access for publications
|--------------------------------------------------------------------------
*/

// Read publications
Route::group(['middleware' => ['permission:read publications']], function () {
    Route::get('publications', 'PublicationController@index')->name('publications.index');
    Route::get('publications/{id}', 'PublicationController@show')->name('publications.show');
});

// Create publications
Route::group(['middleware' => ['permission:create publications']], function () {
    Route::post('publications', 'PublicationController@store')->name('publications.store');
    Route::get('publications/create', 'PublicationController@create')->name('publications.create');
});

// Delete publications
Route::group(['middleware' => ['permission:delete publications']], function () {
    Route::delete('publications/{id}', 'PublicationController@delete')->name('publications.delete');
});

// Update publications
Route::group(['middleware' => ['permission:update publications']], function () {
    Route::put('publications/{id}', 'PublicationController@update')->name('publications.update');
    Route::get('publications/{id}/edit', 'PublicationController@edit')->name('publications.edit');
});

// Enable/disable publications