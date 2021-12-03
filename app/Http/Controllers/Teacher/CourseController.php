<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Image;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(){
        return view('teachers.index');
    }
    public function show(Course $course){
        // 
    }
    public function create(){
        $categories = Category::get()->pluck('name','id')->toArray();
        $levels = Level::get()->pluck('name','id')->toArray();
        $prices = Price::get()->pluck('name','id')->toArray();
        return view('teachers.courses.create',compact('categories','levels','prices'));
    }
    public function store(CourseRequest $request){
        $course = Course::create($request->all());
        $path = Storage::put('courses',$request->file('image'));
        Image::create([
            'course_id' => $course->id,
            'url' => $path,
        ]);
        return redirect()->route('teacher.courses.index')->with('success','El curso fue creado con exito');
    }
    public function edit(Course $course){
        $categories = Category::get()->pluck('name','id')->toArray();
        $levels = Level::get()->pluck('name','id')->toArray();
        $prices = Price::get()->pluck('name','id')->toArray();
        return view('teachers.courses.edit',compact('course','categories','levels','prices'));
    }
    public function update(CourseRequest $request,Course $course){
        $course->update($request->all());

        if($request->file('image')){
            Storage::delete($course->image->url);
            $path = Storage::put('courses',$request->file('image'));
            $course->image()->update([
                'url' => $path,
            ]);
        }
        return redirect()->route('teacher.courses.index')->with('success','El curso se actualizó con exito');        
    }
    public function destroy(Course $course){
        // 
    }
    
    // Other methods
    public function goals(Course $course){
        return view('teachers.courses.goals',compact('course'));
    }
    public function requirements(Course $course){
        return view('teachers.courses.requirements',compact('course'));
    }
    public function lessons(Course $course){
        return view('teachers.courses.lessons',compact('course'));
    }
}
