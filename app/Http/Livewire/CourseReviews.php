<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseReviews extends Component
{
    public $course;
    public $reviews;
    public function mount(Course $course){
        $this->course = $course;
    }
    public function render()
    {
        $this->reviews = $this->course->reviews;
        return view('livewire.course-reviews');
    }
}
