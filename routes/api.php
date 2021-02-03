<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PostsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('indonesia',[ApiController::class, 'indonesia']);
Route::get('provinsi',[ApiController::class, 'allProvinsi']);
Route::get('provinsi/{id}',[ApiController::class, 'getProvinsi']);

// positif, sembuh, meninggal
Route::get('positif',[ApiController::class, 'positif']);
Route::get('sembuh',[ApiController::class, 'sembuh']);
Route::get('meninggal',[ApiController::class, 'meninggal']);
