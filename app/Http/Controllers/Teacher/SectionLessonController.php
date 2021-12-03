<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionLessonController extends Controller
{
    public function index(Section $section){
        return view('teachers.lessons.index',compact('section'));
    }
    public function create(Section $section){
        $platforms = Platform::all()->pluck('name','id')->toArray();
        return view('teachers.lessons.create',compact('platforms','section'));
    }
    public function store(LessonRequest $request,Section $section){
        $this->authorize('owner',$section);
        Lesson::create($request->all());
        return redirect()->route('teacher.sections.lessons.index',$section);
    }
    public function edit(Section $section,Lesson $lesson){
        $platforms = Platform::all()->pluck('name','id')->toArray();
        return view('teachers.lessons.edit',compact('platforms','lesson','section'));
    }
    public function update(LessonRequest $request,Section $section,Lesson $lesson){
        $lesson->update($request->all());
        return redirect()->route('teacher.lessons.index',compact('section'))
            ->with('success','La lección se actualizó con exito');
    }
}
