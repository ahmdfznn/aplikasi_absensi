<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;

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


Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'check');
        Route::get('register', 'register')->name('register');
        Route::post('register', 'add');
    });
});

Route::middleware('karyawan')->group(function () {
});

Route::middleware('auth')->group(function () {

    Route::controller(PagesController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('laporan', 'laporan');
    });

    Route::resource('karyawan', KaryawanController::class);

    Route::resource('absensi', AbsensiController::class);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
