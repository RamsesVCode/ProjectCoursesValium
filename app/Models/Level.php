<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    const BASIC = 'Basico';
    const MEDIUM = 'Medio';
    const ADVANCED = 'Avanzado';
    protected $fillable = [
        'name',
    ];
    //Relation one to many with courses
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
