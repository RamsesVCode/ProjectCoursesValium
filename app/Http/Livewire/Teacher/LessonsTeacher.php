<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Lesson;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\WithPagination;
class LessonsTeacher extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $paginationTheme = "bootstrap";
    public $section;
    public $search;
    public $lesson_ids;
    protected $listeners = ['delete'];

    public function mount(Section $section){
        $this->authorize('owner',$section);
        $this->section = $section;
        $this->lesson_ids = $this->section->lessons->pluck('id')->toArray();
    }
    public function render()
    {
        $lessons = Lesson::whereIn('id',$this->lesson_ids)
            ->where('name','LIKE','%'.$this->search.'%')
            ->paginate(5);
        return view('livewire.teacher.lessons-teacher',compact('lessons'));
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function delete(Lesson $lesson){
        $lesson->delete();
        $this->section = Section::find($this->section->id);
    }
}
