<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    const YOUTUBE = 'Youtube';
    const VIMEO = 'Vimeo';
    protected $fillable = [
        'name',
    ];
    //Relation one to many with lessons
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
