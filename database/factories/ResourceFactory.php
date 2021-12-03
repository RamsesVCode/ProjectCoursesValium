<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'url' => 'resources/'.$this->faker->image('public/storage/resources',640,480,null,false),
            'description' => $this->faker->paragraph(1),
            'type' => $this->faker->randomElement([Resource::PDF,Resource::IMAGE,Resource::ZIP]),
            // 'type' => Resource::IMAGE,
        ];
    }
}
