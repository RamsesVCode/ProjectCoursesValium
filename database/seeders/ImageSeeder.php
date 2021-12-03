<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        foreach($courses as $course){
            Image::factory()->create([
                'course_id' => $course->id,
            ]);
        }
        // Course::all()->each(function($course){
        //     Image::factory()->create([
        //         'course_id' => $course->id,
        //     ]);
        // });
    }
}
