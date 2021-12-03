<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
        'Gratis'=>0,
        '9.99'=>9.99,
        '19.99'=>19.99,
        '29.99'=>29.99,
        '39.99'=>39.99,
        '49.99'=>49.99,
        '59.99'=>59.99,
        '99.99'=>99.99
        ];
        foreach($prices as $price => $key){
            Price::create([
                'name'=>$price,
                'mount'=>$key
            ]);
        }
    }
}
