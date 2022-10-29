<?php

use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

Route::resource('Service', ServiceController::class);
Route::resource('User', UserController::class);
Route::get('/', function() {
    return view('FirstScreen.index');
})->name('home');

// Rutas Personalizadas
Route::prefix('/PaymentDetail')->group( function () {
    Route::get('/', [PaymentDetailController::class, 'index']);
    Route::get('/SpotifyDetail', [PaymentDetailController::class, 'spotifyDetail'])->name('spotifyDetail');
    Route::get('/NetflixyDetail', [PaymentDetailController::class, 'netflixDetail'])->name('netflixDetail');
    Route::get('/DisneyDetail', [PaymentDetailController::class, 'disneyDetail'])->name('disneyDetail');
});
