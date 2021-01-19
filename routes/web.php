<?php

use Illuminate\Support\Facades\Route;

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

        Route::get('provinsi',function()
        {
            return view('admin.provinsi.index');
        });
});
