<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    const DRAFT = 'DRAFT';
    const PENDING = 'PENDING';
    const PUBLISHED = 'PUBLISHED';
    const REJECTED = 'REJECTED';
    protected $appends = [
        'average_reviews',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'featured',
        'user_id',
        'category_id',
        'level_id',
        'price_id'
    ];
    // URL amigables
    // public function getRouteKeyName(){
    //     return 'slug';
    // }
    //relation one to many with Users (teacher)
    public function teacher(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Relation many to one with prices
    public function price(){
        return $this->belongsTo(Price::class);
    }
    //Relation one to one with images
    public function image(){
        return $this->hasOne(Image::class);
    }
    //Relation many to one with category
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Relation many to one with levels
    public function level(){
        return $this->belongsTo(Level::class);
    }
    //Relation many to many with students (users)
    public function students(){
        return $this->belongsToMany(User::class);
    }
    //Relation one to many with sections
    public function sections(){
        return $this->hasMany(Section::class);
    }
    //Relation one to many with requirements
    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
    //Relation one to maty with reviews
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    //Relation one to many with goals
    public function goals(){
        return $this->hasMany(Goal::class);
    }
    //Relation one to many with order_lines
    public function order_lines(){
        return $this->hasMany(OrderLine::class);
    }
    //One to many relationship with observatios
    public function observations(){
        return $this->hasMany(Observation::class);
    }
    // Lessons
    public function lessons(){
        return $this->hasManyThrough(Lesson::class,Section::class);
    }


    //ACCESOR
    //Accesor Lessons
    public function getLessonsAttribute(){
        $sections = $this->sections()->pluck('id');
        return Lesson::whereIn('section_id',$sections)->get();
    }
    //Accesor average Reviews
    public function getAverageReviewsAttribute(){
        return round($this->reviews()->pluck('rating')->avg(),2);
    }
    // Accesor Students count
    public function getStudentsCountAttribute(){
        return $this->students->count();
    }
    // Accesor for percent Course
    // public function getCoursePercentAttribute(){
    //     return $this->
    // }

    //scope Featured
    public function scopeFeatured($query){
        return $query->where('featured',true);
    }
    //scope Relations
    public function scopeRelations($query){
        $query->with('teacher','price','image');
    }
    //scope Published
    public function scopePublished($query){
        return $query->where('status',Course::PUBLISHED);
    }
    //query scopes para filtros
    public function scopeCategoryId($query,$category_id){
        if($category_id){
            return $query->where('category_id',$category_id);
        }
    }
    // Scope levelId
    public function scopeLevelId($query,$level_id){
        if($level_id){
            return $query->where('level_id',$level_id);
        }
    }
    // Scope stateTitle for livewire
    public function scopeStatusTitle($query,$status){
        if($status){
            return $query->where('status',$status);
        }
    }
}
