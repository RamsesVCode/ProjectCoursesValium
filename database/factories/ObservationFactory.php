<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6,false),
            'description' => $this->faker->paragraph(3),
            'user_id' => 1
        ];
    }
}
