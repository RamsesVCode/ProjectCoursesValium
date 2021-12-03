<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [Level::BASIC,Level::MEDIUM,Level::ADVANCED];
        foreach($levels as $level){
            Level::create([
                'name' => $level,
            ]);
        }
    }
}
