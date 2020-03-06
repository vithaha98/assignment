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

Route ::get('/','Homecontroller@index');
Route::group(
    [
        'prefix'=>'admin',
        'as' =>'admin.',
        'middleware' => ['adminLogin']
    ],
    function (){
        Route ::get('/','AdminController@index');
        Route::get('posts','AdminController@post_index')->name('posts');
        Route::get('users','AdminController@users_index')->name('users');
        Route::get('cates','AdminController@cates_index')->name('cates');
        Route::get('comments','AdminController@comment_index')->name('comments');
        Route::get('posts/create','AdminController@create_post')->name('posts_create');
        Route::delete('comments/{id}','AdminController@comments_destroy')->name('comments_destroy');
        Route::get('users/edit/{id}','AdminController@edit_user')->name('edit_user');
        Route::put('update_user/{id}','AdminController@update_user')->name('update_user');
        Route::get('cates/edit/{id}','AdminController@edit_cates')->name('edit_cates');
        Route::put('update_cates/{id}','AdminController@update_cates')->name('update_cates');
        Route::delete('cates/{id}','AdminController@cates_destroy')->name('cates_destroy');
        Route::delete('users/{id}','AdminController@users_destroy')->name('users_destroy');
        Route::get('cates/add','AdminController@create_cates')->name('create_cates');
        Route::put('cates','AdminController@cates_store')->name('cates_store');
        Route::get('users/create','AdminController@create_user')->name('create_user');
        Route::put('users','AdminController@users_store')->name('users_store');
    }
);
Route::group( ['middleware' => ['auth']], function() {
    Route::resource('posts', 'PostController');
    Route::get('users/show', 'UserController@show')->name('users.show');
    Route::resource('users', 'UserController')->parameters([
        'users' => 'users?'
    ])->except([
        'show',
    ]);
});


Route::post('comment/{id}', 'PostController@comment')->name('posts.comment');

Auth::routes();
