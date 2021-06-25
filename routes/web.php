<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }
    return redirect()->route('home');
})->name('home');

Auth::routes();

// this overrides the route on resource route group.
Route::get('products/{id}', 'ProductController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionController');

    // Roles
    Route::delete('roles/destroy', 'RoleController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RoleController');

    // Users
    Route::delete('users/destroy', 'UserController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UserController');
    Route::post('users/profile/{user}', ['as' => 'users.avatar.update', 'uses' => 'UserController@updateAvatar']);

    // User Profile
    Route::get('profile/{user}', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    // Products
    Route::resource('products', 'ProductController');
});
