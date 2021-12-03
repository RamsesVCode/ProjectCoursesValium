<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CoursesTeacher extends Component
{
    use WithPagination,AuthorizesRequests;
    protected $paginationTheme = "Bootstrap";
    
    public $categories;
    public $levels;
    public $courses_id;
    public $categoryId;
    public $levelId;
    public $search;

    public $levelName;
    public $categoryName;
    
    // listeners
    protected $listeners = ['delete'];

    // FILTER 
    public function mount(){
        $this->categories = Category::select('id','name')->get();
        $this->levels = Level::select('id','name')->get();
        $this->courses_id = auth()->user()->courses->pluck('id')->toArray();
    }
    public function render(){
        $courses = Course::whereIn('id',$this->courses_id)
            ->categoryId($this->categoryId)
            ->levelId($this->levelId)
            ->where('title','LIKE','%'.$this->search.'%')
            ->paginate(15);
        return view('livewire.teacher.courses-teacher',compact('courses'));
    }
    public function changeCategory($id){
        $this->categoryId = $id;
        $this->categoryName = Category::find($id)->name;
        $this->resetPage();
    }
    public function changeLevel($id){
        $this->levelId = $id;
        $this->levelName = Level::find($id)->name;
        $this->resetPage();
    }
    public function resetVars(){
        $this->reset(['categoryId','levelId','categoryName','levelName']);
        $this->resetPage();
    }
    public function updatingSearch(){
        $this->resetVars();
    }
    // TRANSLATE
    public function translateStatus($word){
        $translate = null;
        switch($word){
            case "DRAFT":
                $translate = 'Borrador';
                break;
            case "PENDING":
                $translate = 'Pendiente';
                break;
            case "PUBLISHED":
                $translate = 'Publicado';
                break;
            case "REJECTED":
                $translate = 'Rechazado';
                break;
        }
        return $translate;
    }
    // DELETE
    public function delete(Course $course){
        $this->authorize('dictated',$course);
        if($course->image){
            Storage::delete($course->image->url);
        }
        $course->delete();
    }
}
