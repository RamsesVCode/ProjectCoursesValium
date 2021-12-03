<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;

class CoursesCategory extends Component
{
    public $category_id;
    public $categories;
    public $categories_id;
    public function mount(){
        $this->category_id = Category::first()->id;
        $this->categories = Category::select('id','name')->get();
        $this->categories_id = $this->categories->pluck('id')->toArray();
    }
    public function render()
    {
        $courses = Course::published()->where('category_id',$this->category_id)->relations()
            ->withCount('reviews')->take(4)->get();
        return view('livewire.courses-category',compact('courses'));
    }
    //WebHook for category_id
    public function updatedCategoryId(){
        if(array_search($this->category_id,$this->categories_id)===false){
            $this->category_id = Category::first()->id;
            abort(403,"Accion Prohibida");
        }
    }
}
