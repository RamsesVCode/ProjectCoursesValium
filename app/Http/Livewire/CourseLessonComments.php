<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Lesson;
use Livewire\Component;

class CourseLessonComments extends Component
{
    // Validation Rules
    protected $rules = [
        'body'=>'required|min:5|max:100',
    ];
    // Properties
    public $body;
    public $lesson;
    public $comments;
    public $user_id;
    // Listeners
    protected $listeners = ['changeLesson'];
    public function mount(Lesson $lesson){
        $this->lesson = $lesson;
    }
    public function render(){
        $this->comments = Comment::where('commentable_type',Lesson::class)
            ->where('commentable_id',$this->lesson->id)
            ->user($this->user_id)->get();
        // $this->comments = $this->lesson->comments;
        return view('livewire.course-lesson-comments');
    }
    public function saveComment(){
        $this->validate();
        // dd(Lesson::class,$this->lesson->id,auth()->id(),$this->body);
        Comment::create([
            'commentable_type' => Lesson::class,
            'commentable_id' => $this->lesson->id,
            'user_id' => auth()->id(),
            'body' => $this->body,
        ]);
        $this->reset('body');
        // $this->lesson->comments()->create([
        //     'user_id' => auth()->id(),
        //     'body' => $this->body,
        // ]);
    }
    public function changeLesson(Lesson $lesson){
        $this->lesson = $lesson;
    }
    public function changeToUser(){
        $this->user_id = auth()->id();
    }
    public function resetOwner(){
        $this->reset('user_id');
    }
}
