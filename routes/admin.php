<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoriesController;





Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function(){
    Route::resource('cats' , CategoriesController::class);
});
