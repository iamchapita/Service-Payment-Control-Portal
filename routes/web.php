<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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
Route::get('/User', [UserController::class, 'index'])->middleware('auth')->name('User');
Route::get('/Service', [ServiceController::class, 'index'])->middleware('auth')->name('Service');
Route::get('/', [UserController::class, 'usersList'])->name('Home');

Route::get('/Dashboard', function () {
    $data['currentView'] = 'Dashboard';
    $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
    $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
    $data['elementsDropdownLinks'] = array('SpotifyDetail', 'NetflixDetail', 'DisneyDetail');
    return view('dashboard', $data);
})->middleware('auth')->name('Dashboard');

// Rutas Personalizadas
Route::prefix('/PaymentDetail')->group(function () {
    Route::get('/', [PaymentDetailController::class, 'index'])->middleware('auth')->name('PaymentDetail');
    Route::get('/SpotifyDetail', [PaymentDetailController::class, 'spotifyDetail'])->middleware('auth')->name('SpotifyDetail');
    Route::get('/NetflixyDetail', [PaymentDetailController::class, 'netflixDetail'])->middleware('auth')->name('NetflixDetail');
    Route::get('/DisneyDetail', [PaymentDetailController::class, 'disneyDetail'])->middleware('auth')->name('DisneyDetail');
    Route::get('/Create', [PaymentDetailController::class, 'create'])->middleware('auth')->name('CreatePaymentDetail');
    Route::post('/UserDetail', [PaymentDetailController::class, 'userDetail'])->name('UserDetail');
    Route::post('/Insert', [PaymentDetailController::class, 'store'])->middleware('auth')->name('InsertPaymentDetail');
    Route::post('/{id}/edit', [PaymentDetailController::class, 'edit'])->middleware('auth')->name('EditPaymentDetail');
    Route::put('/{id}/update', [PaymentDetailController::class, 'update'])->middleware('auth')->name('UpdatePaymentDetail');
    Route::delete('/{id}/delete', [PaymentDetailController::class, 'destroy'])->middleware('auth')->name('DestroyPaymentDetail');
});
