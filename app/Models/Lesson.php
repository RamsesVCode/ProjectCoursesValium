<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'url',
        'iframe',
        'section_id',
        'platform_id',
    ];
    //Relation many to one with section
    public function section(){
        return $this->belongsTo(Section::class);
    }
    //Relation many to one with Platform
    public function platform(){
        return $this->belongsTo(Platform::class);
    }
    //Relation one to many with resources
    public function resources(){
        return $this->hasMany(Resource::class);
    }
    //Relation many to many with users
    public function users(){
        return $this->belongsToMany(User::class);
    }
    //One to many relationship with comments
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }


    //Accesor 
    //completes
    public function getCompletedAttribute(){
        return $this->users->contains(auth()->id());
    }
    //Comments count
    public function getCommentsCountAttribute(){
        return $this->comments->count();
    }
    //Resources count
    public function getResourcesCountAttribute(){
        return $this->resources->count();
    }
}
