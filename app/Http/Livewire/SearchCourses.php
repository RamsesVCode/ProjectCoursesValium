<?php

namespace App\Http\Livewire;
use App\Models\Course;
use Livewire\Component;

class SearchCourses extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search-courses');
    }
    //Propiedad conmutada
    public function getResultsProperty(){
        return Course::where('title','LIKE','%'.$this->search.'%')->take(3)->get() ?? 0;
    }
}
