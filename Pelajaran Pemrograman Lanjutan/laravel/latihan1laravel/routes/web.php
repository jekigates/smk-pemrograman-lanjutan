<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiswaController;

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
    // return view('welcome');
    return "Respon ini diterima dari path / dengan metode GET";
});

// Route::get('/books', 'BookController@index');
// Route::get('/books/create', 'BookController@create');
// Route::post('/books', 'BookController@store');
// Route::get('/books/{id}', 'BookController@show');
// Route::get('/books/{id}/edit', 'BookController@edit');
// Route::put('/books/{id}', 'BookController@update');
// Route::delete('/books/{id}', 'BookController@destroy');

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/books/{id}/edit', [BookController::class, 'edit']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);

Route::get('/siswas', [SiswaController::class, 'index']);
Route::get('/siswas/create', [SiswaController::class, 'create']);
Route::post('/siswas', [SiswaController::class, 'store']);
Route::get('/siswas/{id}', [SiswaController::class, 'show']);
Route::get('/siswas/{id}/edit', [SiswaController::class, 'edit']);
Route::put('/siswas/{id}', [SiswaController::class, 'update']);
Route::delete('/siswas/{id}', [SiswaController::class, 'destroy']);