<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgencyController;

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
    return view('welcome');
});

Route::get('/agencies', [AgencyController::class, 'index']);
Route::get('/agencies/create', [AgencyController::class, 'create']);
Route::post('/agencies', [AgencyController::class, 'store']);
Route::get('/agencies/{id}/edit', [AgencyController::class, 'edit']);
Route::put('/agencies/{id}', [AgencyController::class, 'update']);
Route::delete('/agencies/{id}', [AgencyController::class, 'destroy']);