<?php

use App\Http\Controllers\Admin\DriverController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware("auth")->prefix("admin")->name("admin.")->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin');
    })->name('index');
    //
    // Drivers Management
    //
    Route::resource('drivers' , DriverController::class);
});

