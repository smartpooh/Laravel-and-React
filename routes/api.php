<?php

use App\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\TodoList as TodoListResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware(['auth:sanctum'])->group(function () {
//    Route::resource('lists', 'TodoListApiController');
//    Route::resource('items', 'ListItemApiController');
//});
//Route::middleware('auth:sanctum')->resource('/lists', 'TodoListApiController');


Route::middleware('auth:sanctum')->get('/lists', 'TodoListApiController@index');
Route::middleware('auth:sanctum')->get('/items/{list_id}', 'ListItemApiController@index');


Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/logout', 'UserController@logout');


