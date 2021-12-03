<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Observation;
use App\Models\Order;
use App\Models\Platform;
use App\Models\Requirement;
use App\Models\Resource;
use App\Models\Review;
use App\Models\Section;
use App\Models\User;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(50)->create([
            'status' => Course::PUBLISHED,
        ])
        ->each(function($course){
            //One only image for course
            Image::factory()->create([
                'course_id' => $course,
            ]);
            //Many sections for course (add lessons for section)
            Section::factory(mt_rand(3,6))->create([
                'course_id'=>$course,
            ])->each(function($section){
                $lessons = Lesson::factory(mt_rand(3,6))->create([
                    'section_id' => $section,
                    'platform_id' => Platform::find(2)->id,
                ]);
                Resource::factory()->create([
                    'lesson_id' => $lessons->random(),
                ]);
            });
            //Many requirements for course
            Requirement::factory(mt_rand(1,4))->create([
                'course_id' => $course,
            ]);
            //Many goals for course
            Goal::factory(mt_rand(1,5))->create([
                'course_id' => $course,
            ]);
            //Many students for course (users_enrolled)
            $students = User::select('id')->get()->random(mt_rand(10,15));
            $course->students()->attach($students);

            //Reviews for course of enrolled students
            foreach($students as $student){
                Review::factory()->create([
                    'user_id'=>$student->id,
                    'course_id'=>$course->id,
                ]);
            }
            //Comments for course
            // $random_students = $students->random(7);
            $lessons = $course->lessons->random(mt_rand(6,10));
            foreach($lessons as $lesson){
                Comment::factory()->create([
                    'commentable_id' => $lesson->id,
                    'commentable_type' => Lesson::class,
                    'user_id' => $students->random()->id,
                ]);
            }
        });
        Course::factory(20)->create()
        ->each(function($course){
            //One only image for course
            Image::factory()->create([
                'course_id' => $course,
            ]);
            //Many sections for course (add lessons for section)
            Section::factory(mt_rand(3,6))->create([
                'course_id'=>$course,
            ])->each(function($section){
                $lessons = Lesson::factory(mt_rand(3,6))->create([
                    'section_id' => $section,
                    'platform_id' => Platform::find(2)->id,
                ]);
                Resource::factory()->create([
                    'lesson_id' => $lessons->random(),
                ]);
            });
            //Many requirements for course
            Requirement::factory(mt_rand(1,4))->create([
                'course_id' => $course,
            ]);
            //Many goals for course
            Goal::factory(mt_rand(1,5))->create([
                'course_id' => $course,
            ]);
            //Many students for course (users_enrolled)
            if($course->status == Course::PUBLISHED){
                $students = User::select('id')->get()->random(mt_rand(10,15));
                $course->students()->attach($students);

                //Reviews for course of enrolled students
                foreach($students as $student){
                    Review::factory()->create([
                        'user_id'=>$student->id,
                        'course_id'=>$course->id,
                    ]);
                }
                //Comments for course
                // $random_students = $students->random(7);
                $lessons = $course->lessons->random(mt_rand(6,10));
                foreach($lessons as $lesson){
                    Comment::factory()->create([
                        'commentable_id' => $lesson->id,
                        'commentable_type' => Lesson::class,
                        'user_id' => $students->random()->id,
                    ]);
                }
            }
            //Observations for rejected courses
            if($course->status == Course::REJECTED){
                Observation::factory()->create([
                    'course_id' => $course->id,
                ]);
            }
        });
        $users = User::all();
        foreach($users as $user){
            if($user->students_count>=20){
                $user->update([
                    'featured' => true,
                ]);
            }
        }
    }
}
