<?php

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

Route::get('/post/{id}', '\App\Http\Controllers\PostController@index');

// Route::get('/post/{id}', function ($id) {
//     $post = \App\Models\Post::find($id);
//     // fix this by having a view
//     return view('post', compact('post'));
// });

Route::get('/about', function () {
    return view('about');
    // return "About me";
});

Route::get('/posts', '\App\Http\Controllers\PostController@showAllPost');

Route::post('/store-posts', '\App\Http\Controllers\PostController@storePostMethod');
Route::get('/create-post', '\App\Http\Controllers\PostController@createPost')->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
