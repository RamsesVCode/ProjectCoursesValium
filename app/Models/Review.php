<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        'comment',
        'user_id',
        'comment_id',
    ];
    protected $dates = [
        'created_at',
    ];
    //Relation many to one with user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Relation many to one with course
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
