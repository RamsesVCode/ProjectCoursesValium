<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Livewire\Student\CourseAdvance;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('courses',[CourseController::class,'index'])->name('courses');
Route::get('courses/{course:slug}',[CourseController::class,'show'])->name('courses.show');
Route::get('advance-course/{course:slug}',CourseAdvance::class)->name('courses.advance')
->middleware('auth');

Route::get('students',[StudentController::class,'index'])->name('students.index')
->middleware('auth');