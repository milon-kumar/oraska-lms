<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseChapter>
 */
class CourseChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->text(15);
        return [
            'users_id'=>1,
            'courses_id'=>rand(1,250),
            'name'=>$name,
            'slug'=>Str::slug($name),
            'image'=>'images/default.jpg',
            'serial'=>rand(1,1000),
            'is_free'=>true,
            'status'=>1,
        ];
    }
}
