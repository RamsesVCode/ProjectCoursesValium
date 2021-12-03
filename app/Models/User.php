<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'featured',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    //Relation one to many with Courses
    public function courses(){
        return $this->hasMany(Course::class);
    }
    //Relation many to many with enrolled courses
    public function courses_enrolled(){
        return $this->belongsToMany(Course::class);
    }
    //Relation one to many with observations
    public function observations(){
        return $this->hasMany(Observation::class);
    }
    //Relation one to many with reviews
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    //Relation many to many with lessons
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }
    //Relation one to many with orders
    public function orders(){
        return $this->hasMany(Order::class);
    }
    //One to many relationship with comments (For profile)
    // public function comments(){
    //     return $this->morphMany(Comment::class,'commentable');
    // }
    //One to many relationship with comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    //Relacion atraves de relacion (reviews para profesor)
    public function reviews_teacher(){
        return $this->hasManyThrough(Review::class,Course::class);
    }
    public function sections(){
        return $this->hasManyThrough(Section::class,Course::class);
    }

    // ACCESORS
    // accesor students
    public function getStudentsCountAttribute(){
        return $this->courses->pluck('students_count')->sum();   
    }
    // Accesor students
    // public function 
    // Accesor reviews avg
    public function getReviewsAvgAttribute(){
        return round($this->reviews_teacher()->pluck('rating')->avg(),2);
    }
    
    // SCOPES
    // Scope featured teachers
    public function scopeFeaturedTeachers($query){
        return $query->where('featured',true);
    }
}