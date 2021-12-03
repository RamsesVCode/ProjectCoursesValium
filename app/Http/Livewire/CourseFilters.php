<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class CourseFilters extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $categories;
    public $levels;
    public $category_id;
    public $level_id;
    //Texto de referencia de filtro
    public $category_name;
    public $level_name;
    //////////////////////////////////7
    public function mount(){
        $this->categories = Category::select('id','name')->get();
        $this->levels = Level::select('id','name')->get();
    }
    public function render()
    {
        //No es tan optimo pero funciona
        // $courses = Course::where('category_id','LIKE',$this->category_id)
        //     ->where('level_id','LIKE',$this->level_id)->paginate(8);
        $courses = Course::published()->categoryId($this->category_id)
            ->levelId($this->level_id)
            ->relations()
            ->withCount('reviews')
            ->paginate(8);
        return view('livewire.course-filters',compact("courses"));
    }
    //Hooks para los filtros
    public function updatedCategoryId(){
        $this->category_name = $this->categories->find($this->category_id)->name;
        $this->resetPage();
    }
    public function updatedLevelId(){
        $this->level_name = $this->levels->find($this->level_id)->name;
        $this->resetPage();
    }
    //Reseteo de variables
    public function resetFilters(){
        $this->reset(['category_id','level_id','category_name','level_name']);
    }
}
