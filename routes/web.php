<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('cats' , [CategoriesController::class , 'index']);
Route::get('cats/create' , [CategoriesController::class , 'create']);
Route::post('cats/add' , [CategoriesController::class , 'add']);

Route::get('cats/edit/{id}' , [CategoriesController::class , 'edit']);
Route::put('cats/update/{id}' , [CategoriesController::class , 'update']);
Route::delete('cats/delete/{id}' , [CategoriesController::class , 'delete']);

