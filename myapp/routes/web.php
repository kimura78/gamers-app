<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\RecruitmentsController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Auth\LoginController;


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
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index']);
Route::get('/games', [GamesController::class, 'index']);
Route::get('/game/{game}', [GamesController::class, 'show']);
Route::get('/login/guest', [LoginController::class, 'guest_login']);

Route::group(['middleware' => ['verified']], function() {
  Route::get('/games/create', [GamesController::class, 'create']);
  Route::post('/games', [GamesController::class, 'store']);
  Route::get('/game/{game}/edit', [GamesController::class, 'edit']);
  Route::patch('/games/{game}', [GamesController::class, 'update']);
  Route::delete('/games/{game}', [GamesController::class, 'destroy']);

  Route::get('/recruitments', [RecruitmentsController::class, 'index']);
  Route::get('/recruitment/{recruitment}', [RecruitmentsController::class, 'show']);
  Route::get('/game/{game}/recruitment/create', [RecruitmentsController::class, 'create']);
  Route::post('/recruitments', [RecruitmentsController::class, 'store']);
  Route::get('/recruitment/{recruitment}/edit', [RecruitmentsController::class, 'edit']);
  Route::patch('/recruitments/{recruitment}', [RecruitmentsController::class, 'update']);
  Route::delete('/recruitments/{recruitment}', [RecruitmentsController::class, 'destroy']);

  Route::get('/bookmarks', [BookmarksController::class, 'index']);
  Route::get('/bookmarks/create', [BookmarksController::class, 'create']);
  Route::post('/bookmarks', [BookmarksController::class, 'store']);
  Route::delete('/bookmarks/{bookmark}', [BookmarksController::class, 'destroy']);

  Route::post('/comments', [CommentsController::class, 'store']);
  Route::delete('/comments/{comment}', [CommentsController::class, 'destroy']);
});