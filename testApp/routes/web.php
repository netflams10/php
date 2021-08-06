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

Route::get('/middle', function () {
    // dd(session()->get('test'));
});

Route::get('/admin', function () {
    // if (!auth()->check()) {
    //     throw new \App\Exceptions\HackerAlertException();
    // }
});

Route::get('/{id}', function (\Illuminate\Http\Request $request, $id) {
    // return \App\Models\User::find($id);
    return \App\Models\User::findOrFail($id);
});

Route::middleware('test')->get('/', function () {
    return view('welcome');
});
