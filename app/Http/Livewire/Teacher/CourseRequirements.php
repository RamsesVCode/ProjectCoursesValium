<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CourseRequirements extends Component
{
    public $course;
    public $description;
    public $requirement_edit;
    protected $listeners = ['delete'];
    protected $rules = [
        'requirement_edit.description' => 'required|min:15|max:100',
    ];
    public function mount(Course $course){
        $this->course = $course;
        $this->requirement_edit = new Requirement();
    }
    public function render()
    {
        $requirements = $this->course->requirements;
        return view('livewire.teacher.course-requirements',compact('requirements'));
    }
    public function save(){
        $this->validate([
            'description' => 'required|min:15|max:100',
        ]);
        Requirement::create([
            'description' => $this->description,
            'course_id' => $this->course->id,
        ]);
        $this->course = Course::find($this->course->id);
        $this->reset(['description']);
    }
    public function resetReq(){
        $this->requirement_edit = new Requirement();
    }
    public function edit(Requirement $requirement){
        $this->requirement_edit = $requirement;
    }
    public function update(){
        $this->validate();
        $this->requirement_edit->save();
        $this->requirement_edit = new Requirement();
        $this->course = Course::find($this->course->id);
    }
    public function delete(Requirement $requirement){
        $requirement->delete();
        $this->course = Course::find($this->course->id);
    }
}
