<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $teachers = User::featuredTeachers()->take(10)->get();
        return view('courses.index',compact('teachers'));
    }
    public function show(Course $course){
        $featured_courses = Course::withCount('reviews')->relations()->where('category_id',$course->category_id)->where('id','!=',$course->id)->get();
        $course->load('image','category','level','teacher','reviews','requirements','goals','sections');
        $course->loadCount('reviews','students');
        return view('courses.show',compact('course','featured_courses'));
    }
}
