<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function render()
    {
        // dd(User::find(1)->courses_enrolled->count());
        $users = User::where('name','LIKE','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.users-search',compact('users'));
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function resetVars(){
        $this->reset(['search']);
    }
}
