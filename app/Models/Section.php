<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'course_id',
    ];
    //Relation many to one with course
    public function course(){
        return $this->belongsTo(Course::class);
    }
    //Relation one to many with lessons
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
