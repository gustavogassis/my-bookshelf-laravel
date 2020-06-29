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

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/books', 'BookController@index')->name('books');

    Route::get('/books/create', 'BookController@create');
    Route::post('/books', 'BookController@store');

    Route::get('/books/{id}/edit', 'BookController@edit');
    Route::put('/books/{id}', 'BookController@update');

    Route::post('/books/batch', 'BookController@destroyBatch');
    Route::delete('/books/{id}', 'BookController@destroy');

    Route::get('/books/{id}', 'BookController@show');
});

Auth::routes();