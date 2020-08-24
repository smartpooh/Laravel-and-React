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

Route::get('/', function () {
    return view('app');
});


// Route::get('/{url?}', function () {
//     return view('app');
// })->where('','list');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('lists','TodoListController');
// Route::resource('items','ListItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
