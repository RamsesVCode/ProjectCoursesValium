<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'price_id',
        'order_id',
        'course_id',
    ];
    //Relation many to one with order
    public function order(){
        return $this->belongsTo(Order::class);
    }
    //Relation many to one with course
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
