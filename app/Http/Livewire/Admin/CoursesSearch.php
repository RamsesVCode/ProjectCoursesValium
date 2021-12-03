<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $status;
    public $categoryId;
    public $categories;
    public $categoryName;
    public function mount(){
        $this->categories = Category::select('id','name')->get();
    }
    
    public function render()
    {
        $courses = Course::where('title','LIKE','%'.$this->search.'%')
            ->relations()
            ->with('category','level','students')
            ->statusTitle($this->status)
            ->categoryId($this->categoryId)
            ->paginate(15);
        return view('livewire.admin.courses-search',compact('courses'));
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function resetVars(){
        $this->reset(['search','status','categoryId']);
    }
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
    public function changeStatus($status){
        $this->status = $status;
    }
    public function changeCategory($id){
        $this->categoryId = $id;
        $this->categoryName = Category::find($id)->name ?? "";
    }
}
