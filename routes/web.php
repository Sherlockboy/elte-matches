<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/team/{id}', [HomeController::class, 'team'])->name('team');
Route::post('/submit', [HomeController::class, 'submit'])->name('submit');

Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/team/{team_id}/game/{game_id}/edit', [AdminController::class, 'edit_game'])->name('game.edit');
    Route::post('/game/{id}/update', [AdminController::class, 'update_game'])->name('game.update');
    Route::get('/comment/{id}', [AdminController::class, 'delete_comment'])->name('comment.delete');
});
