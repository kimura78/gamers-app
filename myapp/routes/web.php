<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\RecruitmentsController;

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
Route::get('/game/{game}', [GamesController::class, 'show']);
Route::get('/recruitment/{recruitment}', [RecruitmentsController::class, 'show']);



Route::group(['middleware' => ['auth']], function() {
  Route::get('/games/create', [GamesController::class, 'create']);
  Route::post('/games', [GamesController::class, 'store']);
  Route::get('/games/{game}/edit', [GamesController::class, 'edit']);
  Route::patch('/games/{game}', [GamesController::class, 'update']);
  Route::delete('/games/{game}', [GamesController::class, 'destroy']);

  Route::get('/game/{game}/recruitments/create', [RecruitmentsController::class, 'create']);
  Route::post('/recruitments', [RecruitmentsController::class, 'store']);

});