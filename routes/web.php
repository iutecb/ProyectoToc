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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('uploadimage', 'HomeController@upload');
Route::post('changepassword', 'HomeController@changePassword');
Route::get('admin', 'HomeController@admin')->name('adminPanel');
Route::get('users', 'HomeController@getUsers')->name('users');
Route::post('changeUserStatus', 'HomeController@changeUserStatus');
