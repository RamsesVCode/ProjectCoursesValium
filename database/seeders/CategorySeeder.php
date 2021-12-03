<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Diseño',
            'Desarrollo',
            'Marketing',
            'Informática y software',
            'Desarrollo personal',
            'Negocios',
            'Fotografía',
            'Música'
        ];
        foreach($categories as $category){
            Category::factory()->create([
                'name' => $category,
            ]);
        }
    }
}
