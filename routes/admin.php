<?php

use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\PaperController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\VilleController;
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
    Route::resource('stations' , StationController::class);
    Route::resource('villes' , VilleController::class);
    Route::resource('papers' , PaperController::class);
});

