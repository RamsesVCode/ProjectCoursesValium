<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'course_id',
        'user_id',
    ];
    //Relation many to one with users
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Many to One relatioship with course
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
