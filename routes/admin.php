<?php

use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\TruckController;
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
    Route::resource('trucks' , TruckController::class);
});

