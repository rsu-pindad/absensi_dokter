<?php

use App\Http\Controllers\Dokter\FaceRecognitionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [GoogleLoginController::class, 'handleGoogleLogout'])->name('google-logout');

    Route::get('/', [BerandaController::class,         'index'])->name('beranda');
    Route::post('/absensi', [BerandaController::class, 'store'])->name('absensi-store');

    Route::get('/absensi-face', [FaceRecognitionController::class,     'face'])->name('absensi-face');
    Route::get('/absensi-location', [FaceRecognitionController::class, 'location'])->name('absensi-location');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class,                  'login'])->name('login');
    Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google-redirect');
    Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google-callback');
});
