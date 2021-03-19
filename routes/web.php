<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index']);
Route::get('/provinsi/{id}', [FrontController::class, 'getKotaProvinsi']);
Route::get('/kota/{id}', [FrontController::class, 'getKecamatanKota']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['register' => false]);

// admin route
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);
    Route::resource('rw', RwController::class);
    Route::resource('kasus', KasusController::class);
    Route::resource('users', UserController::class)->middleware('admin');

    // report
    Route::get('report-provinsi', [ReportController::class, 'getReportProvinsi'])->middleware('admin');
    Route::post('report-provinsi', [ReportController::class, 'ReportProvinsi'])->middleware('admin');

});
