<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Goal;
use Livewire\Component;

class GoalDetail extends Component
{
    public $goal;
    protected $rules = [
        'goal.description' => 'required|string|min:15|max:100',
    ];
    public function mount(Goal $goal){
        $this->goal = $goal;
    }
    public function render()
    {
        return view('livewire.teacher.goal-detail');
    }
    public function save(){
        $this->validate();
        $this->goal->save();
    }
}
