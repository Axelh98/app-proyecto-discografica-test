<?php

use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::controller(PackageController::class)->prefix('packages')->group( function () 
{
    Route::get("/","index")->name("packages.index");
    Route::get("/create","create")->name("packages.create");
    Route::post("/store","store")->name("packages.store");
    Route::get('/{package}','show')->name('packages.show');
    Route::get('/{package}/edit','edit')->name('packages.edit');
    Route::put('/{package}','update')->name('packages.update');
    Route::delete('/{package}','destroy')->name('packages.destroy');

    
    Route::get('/{package}/files/create','fileUpload')->name('packages.files.create');

    Route::get('/{package}/tracks/create','trackCreate')->name('packages.tracks.create');
});