<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GamesController;

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
Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/games', [GamesController::class, 'index']);
// Route::get('/games/{game}', [GamesController::class, 'show']);

Route::group(['middleware' => ['auth']], function() {
  Route::get('/games/create', [GamesController::class, 'create']);
  Route::post('games', [GamesController::class, 'store']);
});