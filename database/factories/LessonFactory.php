<?php

namespace Database\Factories;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
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
            'description' => $this->faker->paragraph(2),
            'url' => 'https://www.youtube.com/watch?v=a5V3CoXqF_s',
            'iframe' => '<iframe src="https://player.vimeo.com/video/646599504?h=7f07e41b96" width="640" height="360" frameborder="0" allowfullscreen></iframe>',
        ];
    }
}
