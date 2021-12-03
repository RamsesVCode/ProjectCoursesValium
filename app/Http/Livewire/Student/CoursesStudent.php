<?php

namespace App\Http\Livewire\Student;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;
class CoursesStudent extends Component
{
    use WithPagination;
    protected $paginationTheme = "Bootstrap";
    public $categories;
    public $levels;
    public $courses_id;
    public $categoryId;
    public $levelId;
    public $levelName;
    public $categoryName;
    public $search;

    // public $courses;
    public function mount(){
        $this->categories = Category::select('id','name')->get();
        $this->levels = Level::select('id','name')->get();
        $this->courses_id = auth()->user()->courses_enrolled->pluck('id')->toArray();
    }
    public function render(){
        $courses = Course::whereIn('id',$this->courses_id)
            ->categoryId($this->categoryId)
            ->levelId($this->levelId)
            ->where('title','LIKE','%'.$this->search.'%')
            ->withCount('lessons')
            ->paginate(10);
        return view('livewire.student.courses-student',compact('courses'));
    }
    public function changeCategory($categoryId){
        $this->categoryId = $categoryId;
        $this->categoryName = $this->categories->find($this->categoryId)->name;
        $this->resetPage();
    }
    public function updatedLevelId(){
        $this->levelName = $this->levels->find($this->levelId)->name;
        $this->resetPage();
    }
    public function resetVars(){
        $this->reset(['categoryId','levelId','categoryName','levelName']);
        $this->resetPage();
    }
    public function updatingSearch(){
        $this->resetVars();
    }
    //Computed Property
    public function coursePercent($id){
        $course = Course::find($id);
        // Del curso
        $lessons_id = $course->lessons->pluck('id')->toArray();
        // Usuario
        $completed_lessons = auth()->user()->lessons->pluck('id')->toArray();
        $count_coursed = collect(array_intersect($lessons_id,$completed_lessons))->count();
        return round($count_coursed*100/$course->lessons->count(),1);
    }
}
