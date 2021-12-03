<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];
    //Polymorphic relationship with user, lesson
    public function lesson(){
        return $this->morphTo();
    }
    //many to one relationship with user
    public function user(){
        return $this->belongsTo(User::class); 
    }


    //Scope Comment user_id
    public function scopeUser($query,$user_id){
        if($user_id){
            return $query->where('user_id',$user_id);
        }
    }
}
