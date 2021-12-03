<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::published()->featured()->relations()
            ->withCount('reviews')->take(8)->get();
        return view('dashboard',compact('courses'));
    }
}
