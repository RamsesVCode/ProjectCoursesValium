<?php

use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\LessonResourceController;
use App\Http\Controllers\Teacher\SectionLessonController;
use Illuminate\Support\Facades\Route;

Route::resource('courses', CourseController::class)->names('teacher.courses');
Route::get('courses/{course}/goals',[CourseController::class,'goals'])->name('teacher.courses.goals');
Route::get('courses/{course}/requirements',[CourseController::class,'requirements'])->name('teacher.courses.requirements');
Route::get('courses/{course}/lessons',[CourseController::class,'lessons'])->name('teacher.courses.lessons');

Route::resource('sections.lessons', SectionLessonController::class)->names('teacher.sections.lessons')
->except('destroy');

Route::resource('lessons.resources', LessonResourceController::class)->names('teacher.lessons.resources')
->except('destroy');

?>