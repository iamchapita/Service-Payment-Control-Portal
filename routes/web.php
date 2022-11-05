<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

// Rutas agrupadas
Route::resource('Service', ServiceController::class);
Route::resource('User', UserController::class);
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Rutas individuales
Route::get('/', [UserController::class, 'usersList'])->name('home');

// Rutas Personalizadas
Route::prefix('/PaymentDetail')->group( function () {
    Route::get('/', [PaymentDetailController::class, 'index'])->name('historicalDetail');
    Route::get('/SpotifyDetail', [PaymentDetailController::class, 'spotifyDetail'])->name('spotifyDetail');
    Route::get('/NetflixyDetail', [PaymentDetailController::class, 'netflixDetail'])->name('netflixDetail');
    Route::get('/DisneyDetail', [PaymentDetailController::class, 'disneyDetail'])->name('disneyDetail');
    Route::get('/create', [PaymentDetailController::class, 'create'])->name('createPaymentDetail');
    // Contiene los detalles de pago de servicio personal
    Route::post('/UserDetail', [PaymentDetailController::class, 'userDetail'])->name('userDetail');
    Route::post('/insert', [PaymentDetailController::class, 'store'])->name('insertPaymentDetail');
    Route::post('/{id}/edit', [PaymentDetailController::class, 'edit'])->name('editPaymentDetail');
    Route::put('/{id}/update', [PaymentDetailController::class, 'update'])->name('updatePaymentDetail');
    Route::delete('/{id}/delete', [PaymentDetailController::class, 'destroy'])->name('destroyPaymentDetail');
});
