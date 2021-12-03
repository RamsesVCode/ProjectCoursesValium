<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Livewire\Component;

class CourseLessons extends Component
{
    public $course;
    public $title;
    public $current_section;
    public $section_edit;
    protected $listeners = ['deleteSection','deleteLesson'];

    protected $rules = [
        'section_edit.title' => 'required|min:10|max:50',
    ];


    public function mount(Course $course){
        $this->course = $course;
        $this->section_edit = new Section();
    }
    public function render(){
        $sections = $this->course->sections;
        return view('livewire.teacher.course-lessons',compact('sections'));
    }
    public function resetSec(){
        // $this->reset('section_edit');
        $this->section_edit = new Section();
    }
    public function save(){
        $this->validate([
            'title' => 'required|min:10|max:50',
        ]);
        $this->course->sections()->create([
            'title' => $this->title,
        ]);
        $this->course = Course::find($this->course->id);
        $this->reset('title');
    }
    public function edit(Section $section){
        $this->section_edit = $section;
    }
    public function update(){
        $this->section_edit->save();
        $this->section_edit = new Section();
        $this->course = Course::find($this->course->id);
    }
    public function deleteSection(Section $section){
        $section->delete();
        $this->course = Course::find($this->course->id);
    }
    public function deleteLesson(Lesson $lesson){
        $lesson->delete();
        $this->current_section = Section::find($this->current_section->id);
    }
    public function setCurrentSection(Section $section){
        $this->current_section = $section;
        $this->course = Course::find($this->course->id);
    }
}
