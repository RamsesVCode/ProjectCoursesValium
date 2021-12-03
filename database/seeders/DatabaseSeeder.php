<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');
        Storage::deleteDirectory('profile-photos');
        Storage::makeDirectory('profile-photos');
        Storage::deleteDirectory('resources');
        Storage::makeDirectory('resources');
        User::factory()->create([
            'name' => 'Master',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'), 
        ]);
        User::factory(30)->create();
        $this->call(LevelSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
