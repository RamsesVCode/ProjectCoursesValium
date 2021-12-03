<?php

namespace App\Http\Livewire\Student;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseAdvance extends Component
{
    use AuthorizesRequests;
    public $course;
    public $sections;
    public $resources;
    public $current_lesson;
    
    public function mount(Course $course){
        $this->authorize('enrolled',$course);
        $this->course = $course;
        $this->sections = $course->sections;
        // Optimization
        $this->sections->load('lessons');
        $this->course->load('teacher');
        // Current
        foreach($this->course->lessons as $lesson){
            if($lesson->completed){
                $this->current_lesson = $lesson;
            }
        }
        //If not exists finished lesson
        if(!$this->current_lesson){
            $this->current_lesson = $this->course->lessons->first();
        }
        $this->resources = $this->current_lesson->resources;
    }
    public function render(){
        return view('livewire.student.course-advance');
    }
    //Function for change lesson
    public function changeLesson(Lesson $lesson){
        $this->current_lesson = $lesson;
        $this->emitTo('course-lesson-comments','changeLesson',$lesson->id);
        $this->resources = $this->current_lesson->resources;
    }
    //Function for check Completed lesson
    public function checkCompleted(){
        if($this->current_lesson->completed){
            $this->current_lesson->users()->detach(auth()->id());
        }else{
            $this->current_lesson->users()->attach(auth()->id());
        }
        $this->current_lesson = Lesson::find($this->current_lesson->id);
    }
    //Funcion countCompletedLessons
    public function countCompletedLessons($lessons){
        $i = 0;
        //get Completed lessons count
        foreach($lessons as $lesson){
            if($lesson->completed){
                $i++;
            }
        }
        return $i;
    }
    //Conmputed Property for advance
    public function getAdvanceProperty(){
        $lessons = $this->course->lessons;
        $i = $this->countCompletedLessons($lessons);
        return round(($i*100)/$lessons->count(),1);
    }
    //Count Total Lessons
    public function totalLessons(){
        return $this->course->lessons->count();
    }
    //Computed Porperty Lesson Index
    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current_lesson->id);
    }
    public function prevLesson(){
        if($this->index <= 0){
            return false;
        }
        return $this->course->lessons[$this->index-1];
    }
    public function nextLesson(){
        if($this->index >= $this->course->lessons->count()-1){
            return false;
        }
        return $this->course->lessons[$this->index+1];
    }
    public function downloadFile($url){
        return response()->download(storage_path('app/public/'.$url));
    }
}