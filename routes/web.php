<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Dokter\FaceRecognitionController;
use App\Http\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    // return view('welcome');
    return view('guest.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [GoogleLoginController::class, 'handleGoogleLogout'])->name('google.logout');

    Route::post('absensi', [BerandaController::class, 'store'])->name('absensi-store');
});

Route::get('/beranda', [BerandaController::class, 'index'])
    ->middleware('auth');

Route::get('/dokter/face', [FaceRecognitionController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
});
