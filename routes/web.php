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


Route::get('/Service', [ServiceController::class, 'index'])->middleware('auth')->name('Service');
Route::get('/', [UserController::class, 'usersList'])->name('Home');

Route::get('/Dashboard', function () {
    $data['currentView'] = 'Dashboard';
    $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
    $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Spotify 3', 'Historico Netflix', 'Historico Disney+');
    $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'Spotify3Detail', 'NetflixDetail', 'DisneyDetail');
    return view('dashboard', $data);
})->middleware('auth')->name('Dashboard');

// Rutas Personalizadas

Route::prefix('/User')->group(function () {
    Route::get('/', [UserController::class, 'index'])->middleware('auth')->name('User');
    Route::get('/Create', [UserController::class, 'create'])->middleware('auth')->name('CreateUser');
    Route::post('/Insert', [UserController::class, 'store'])->middleware('auth')->name('InsertUser');
    Route::post('/{id}/edit', [UserController::class, 'edit'])->middleware('auth')->name('EditUser');
    Route::put('/{id}/update', [UserController::class, 'update'])->middleware('auth')->name('UpdateUser');
});

Route::prefix('/PaymentDetail')->group(function () {
    Route::get('/', [PaymentDetailController::class, 'index'])->middleware('auth')->name('PaymentDetail');
    Route::get('/Spotify3Detail', [PaymentDetailController::class, 'spotify3Detail'])->middleware('auth')->name('Spotify3Detail');
    Route::get('/Spotify2Detail', [PaymentDetailController::class, 'spotify2Detail'])->middleware('auth')->name('Spotify2Detail');
    Route::get('/SpotifyDetail', [PaymentDetailController::class, 'spotifyDetail'])->middleware('auth')->name('SpotifyDetail');
    Route::get('/NetflixyDetail', [PaymentDetailController::class, 'netflixDetail'])->middleware('auth')->name('NetflixDetail');
    Route::get('/DisneyDetail', [PaymentDetailController::class, 'disneyDetail'])->middleware('auth')->name('DisneyDetail');
    Route::match(['get', 'post'], '/Create', [PaymentDetailController::class, 'create'])->middleware('auth')->name('CreatePaymentDetail');
    Route::match(['get', 'post'], '/UserDetail', [PaymentDetailController::class, 'userDetail'])->name('UserDetail');
    Route::post('/Insert', [PaymentDetailController::class, 'store'])->middleware('auth')->name('InsertPaymentDetail');
    Route::match(['get', 'post'], '/{id}/edit', [PaymentDetailController::class, 'edit'])->middleware('auth')->name('EditPaymentDetail');
    Route::put('/{id}/update', [PaymentDetailController::class, 'update'])->middleware('auth')->name('UpdatePaymentDetail');
    Route::delete('/{id}/delete', [PaymentDetailController::class, 'destroy'])->middleware('auth')->name('DestroyPaymentDetail');
});
