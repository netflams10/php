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

// Route::get('/', function () {
//     // echo '<pre>';
//     // print_r(app()->make('redis'));
//     // echo '</pre>';

//     $redis = app()->make('redis');
//     $redis->set("key1", "testValue");
//     return $redis->get("key1");
// });



Route::get('/', function () {return view('welcome');});

Route::get('/article/{id}', 'App\Http\Controllers\BlogController@show')->where('id', '[0-9]+');
Route::get('/article', 'App\Http\Controllers\WelcomeController@index');