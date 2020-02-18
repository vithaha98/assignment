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
Route::get('hello', function () {
    $posts = factory(Posts::class, 10)->make();
    return view('hello', [
        'posts' => $posts
    ]);

});
Route::group([
    'prefix' => 'posts',
    'as' => 'post.',
], function () {
    Route::get('create', function () {
        dd("Hello");
    })->name('create');
    Route::get('show', function () {
        $posts = factory(Posts::class, 10)->make();
        return view('posts',[
            'posts' => $posts
        ]);

    })->name('show');
});
