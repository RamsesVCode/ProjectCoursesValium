<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    const ZIP = 'Zip';
    const IMAGE = 'Image';
    const PDF = 'Pdf';
    protected $fillable = [
        'name',
        'url',
        'description',
        'type',
        'lesson_id',
    ];
    //Relation many to one with lesson
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
