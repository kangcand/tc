<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// indo-rw
Route::get('global', [ApiController::class, 'global']);
Route::get('indonesia', [ApiController::class, 'indonesia'])->name('api.indo');
Route::get('provinsi', [ApiController::class, 'allProvinsi']);
Route::get('provinsi/{id}', [ApiController::class, 'getProvinsi']);
Route::get('kota', [ApiController::class, 'kota']);
Route::get('kota/{id}', [ApiController::class, 'singleKota']);
Route::get('kecamatan', [ApiController::class, 'kecamatan']);
Route::get('kecamatan/{id}', [ApiController::class, 'singleKecamatan']);
Route::get('kelurahan', [ApiController::class, 'kelurahan']);
Route::get('kelurahan/{id}', [ApiController::class, 'singleKelurahan']);
Route::get('rw', [ApiController::class, 'rw']);
Route::get('rw/{id}', [ApiController::class, 'singleRw']);
// kasus positif, sembuh, meninggal
Route::get('positif', [ApiController::class, 'positif']);
Route::get('sembuh', [ApiController::class, 'sembuh']);
Route::get('meninggal', [ApiController::class, 'meninggal']);
