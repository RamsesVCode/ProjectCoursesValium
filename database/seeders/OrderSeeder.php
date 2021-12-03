<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user){
            if($user->courses_enrolled->count()>0){
                $courses = $user->courses_enrolled;
                $total_price = $user->courses_enrolled->pluck('price')->sum('mount');
                $order = Order::create([
                    'total_amount' => $total_price,
                    'user_id' => $user->id,
                ]);
                foreach($courses as $course){
                    OrderLine::create([
                        'price' => $course->price->mount,
                        'order_id' => $order->id,
                        'course_id' => $course->id,
                    ]);
                }
            }
        }
    }
}
