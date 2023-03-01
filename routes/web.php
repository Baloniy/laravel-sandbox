<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showRegistrationForm']);
Route::post('/', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/game/{link}', [GameController::class, 'index'])->name('game.index');
    Route::post('/play', [GameController::class, 'play'])->name('game.play');

    Route::get('/history', [GameController::class, 'history'])->name('game.history');


    Route::get('/link-generate', [UserController::class, 'generateNewLink'])->name('link.generate');
    Route::get('/link-deactivate', [UserController::class, 'deactivateLink'])->name('link.deactivate');
});

