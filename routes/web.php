<?php

use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend
Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function (){
    Route::get('/','index')->name('index');
});


//ADMIN

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.index');
    });

});
