<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// admin route
Route::group(['prefix' => 'admin', 'middleware'=>['auth']],function () {
        Route::get('/',function()
        {
            return view('admin.index');
        });
        Route::resource('provinsi', ProvinsiController::class);
        Route::resource('kota', KotaController::class);
        Route::resource('kecamatan', KecamatanController::class);
});
