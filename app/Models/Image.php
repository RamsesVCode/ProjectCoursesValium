<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'course_id',
    ];
    //Relation many to one with courses
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
