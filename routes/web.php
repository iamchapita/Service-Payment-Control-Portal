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

// Rutas individuales
Route::get('/User', [UserController::class, 'index'])->name('User');
Route::get('/Service', [ServiceController::class, 'index'])->name('Service');
Route::get('/', [UserController::class, 'usersList'])->name('Home');

// Rutas Personalizadas
Route::prefix('/PaymentDetail')->group(function () {
    Route::get('/', [PaymentDetailController::class, 'index'])->name('PaymentDetail');
    Route::get('/SpotifyDetail', [PaymentDetailController::class, 'spotifyDetail'])->name('SpotifyDetail');
    Route::get('/NetflixyDetail', [PaymentDetailController::class, 'netflixDetail'])->name('NetflixDetail');
    Route::get('/DisneyDetail', [PaymentDetailController::class, 'disneyDetail'])->name('DisneyDetail');
    Route::get('/create', [PaymentDetailController::class, 'create'])->name('CreatePaymentDetail');
    // Contiene los detalles de pago de servicio personal
    Route::post('/UserDetail', [PaymentDetailController::class, 'userDetail'])->name('UserDetail');
    Route::post('/insert', [PaymentDetailController::class, 'store'])->name('InsertPaymentDetail');
    Route::post('/{id}/edit', [PaymentDetailController::class, 'edit'])->name('EditPaymentDetail');
    Route::put('/{id}/update', [PaymentDetailController::class, 'update'])->name('UpdatePaymentDetail');
    Route::delete('/{id}/delete', [PaymentDetailController::class, 'destroy'])->name('DestroyPaymentDetail');
});
