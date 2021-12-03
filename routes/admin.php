<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('admin.index');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('levels', LevelController::class)->names('admin.levels');
Route::resource('prices', PriceController::class)->names('admin.prices');
Route::resource('users',UserController::class)->names('admin.users');
Route::resource('courses',CourseController::class)->names('admin.courses');
?>