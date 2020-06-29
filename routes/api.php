<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/authors', 'Api\AuthorController@index');

Route::get('/books', 'Api\BookController@index');

Route::post('/books', 'Api\BookController@store');

Route::put('/books/{id}', 'Api\BookController@update');

Route::delete('/books/{id}', 'Api\BookController@destroy');

Route::get('/books/{id}', 'Api\BookController@show');