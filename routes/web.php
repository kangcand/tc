<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\FrontController;

Route::get('/',[FrontController::class,'index']);
Route::get('/provinsi/{id}',[FrontController::class,'getKotaProvinsi']);
Route::get('/kota/{id}',[FrontController::class,'getKecamatanKota']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['register'=>false]);

// admin route
Route::group(['prefix' => 'admin', 'middleware'=>['auth']],function () {
        Route::get('/',function()
        {
            return view('admin.index');
        });
        Route::resource('provinsi', ProvinsiController::class);
        Route::resource('kota', KotaController::class);
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('kelurahan', KelurahanController::class);
        Route::resource('rw', RwController::class);
        Route::resource('kasus', KasusController::class);
});
