<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6, false);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(2),
            'status' => $this->faker->randomElement([Course::DRAFT,Course::PENDING,Course::PUBLISHED,Course::REJECTED]),
            'featured' => $this->faker->randomElement([true,false]),
            'user_id' => User::get()->random(),
            'category_id' => Category::get()->random(),
            'level_id' => Level::get()->random(),
            'price_id' => Price::get()->random(),
        ];
    }
}
