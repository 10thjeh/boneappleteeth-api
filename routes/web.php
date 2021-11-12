<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\ResepController;

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

Route::get('/bahan', [BahanController::class, 'get']);
Route::get('/bahan/{id}', [BahanController::class, 'get']);
Route::get('/resep',[ResepController::class, 'get']);
Route::get('/resep/{id}', [ResepController::class, 'get']);
