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
use App\Models\Posts;

Route ::get('/','Homecontroller@index');
Route ::get('/admin','Postcontroller@index');
Route::resource('posts','PostController');
Route::resource('users','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
