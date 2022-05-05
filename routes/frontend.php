<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProfileController;

Route::prefix('profile')->as('profile.')->middleware(['auth'])->group(function(){
    Route::get("edit" , [ProfileController::class , "edit"])->name("edit");
    Route::put("update" , [ProfileController::class , "update"])->name("update");

});
