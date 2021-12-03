<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        'user_id',
    ];
    //Relation many to one with user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Relation one to many with order_lines
    public function order_lines(){
        return $this->hasMany(OrderLine::class);
    }
}
