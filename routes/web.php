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

// Rutas individuales
// The function or view end with Step is used to make backend operations
// to make possible the action (login or logout)
Route::get('/', [UserController::class, 'usersList'])->name('Home');
Route::get('/login', [AuthController::class, 'loginView'])->name('Login');
Route::post('/loginStep', [AuthController::class, 'loginStep'])->name('LoginStep');
Route::get('/logout', [AuthController::class, 'logout'])->name('Logout');
Route::get('/passwordChange', [AuthController::class, 'passwordChangeView'])->name('PasswordChange');
Route::post('/passwordChangeStep', [AuthController::class, 'passwordChangeStep'])->name('PasswordChangeStep');


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
