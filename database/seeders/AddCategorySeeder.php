<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $laravelForBeginnersCourse = Course::where('title', 'Laravel For Beginners')->first();
        $advancedLaravelCourse = Course::where('title', 'Advanced Laravel')->first();
        $tddTheLaravelWayCourse = Course::where('title', 'TDD The Laravel Way')->first();


        Category::insert([
            ['name' => 'Frontend'],
            ['name' => 'Backend'],
            ['name' => 'Fullstack'],
        ]);


        $laravelForBeginnersCourse->categoryCourses()->attach([1, 2]);
        $advancedLaravelCourse->categoryCourses()->attach([2, 3]);
        $tddTheLaravelWayCourse->categoryCourses()->attach([2]);

    }

}
