<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NewsController;

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
Route::get('/search/username/{username}', [SearchController::class, 'username']);
Route::get('/search/resep/{query}', [SearchController::class, 'resep']);
Route::get('/resepuser/{username}', [ResepController::class, 'getWithUsername']);
Route::get('/news', [NewsController::class, 'get']);
Route::post('/register', [AccountController::class, 'register']);
Route::post('/login', [AccountController::class, 'login']);
Route::post('/rating', [RatingController::class, 'rate']);
Route::post('/resep', [ResepController::class, 'add']);
Route::post('/update', [AccountController::class, 'update']);
Route::post('/delete', [AccountController::class, 'del']);
