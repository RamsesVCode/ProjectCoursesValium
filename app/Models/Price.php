<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mount',
    ];
    //Relation one to many with courses
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
