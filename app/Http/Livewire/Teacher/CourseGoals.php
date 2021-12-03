<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CourseGoals extends Component
{
    public $course;
    public $description;
    public $goal_edit;
    public $listeners = ['delete'];
    protected $rules = [
        'goal_edit.description' => 'required|string|min:15|max:100',
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->goal_edit = new Goal();
    }
    public function render(){
        $goals = $this->course->goals;
        return view('livewire.teacher.course-goals',compact('goals'));
    }
    public function resetGoal(){
        $this->goal_edit = new Goal();
        $this->course = Course::find($this->course->id);
    }

    public function edit(Goal $goal){
        $this->goal_edit = $goal;
    }
    public function update(){
        $this->validate();
        $this->goal_edit->save();
        $this->goal_edit = new Goal();
        $this->course = Course::find($this->course->id);
    }
    public function save(){
        $this->validate([
            'description' => 'required|string|min:15|max:100',
        ]);
        Goal::create([
            'description' => $this->description,
            'course_id' => $this->course->id,
        ]);
        $this->course = Course::find($this->course->id);
        $this->reset('description');
    }
    public function delete(Goal $goal){
        $goal->delete();
        $this->course = Course::find($this->course->id);
    }
}
