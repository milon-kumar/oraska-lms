<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->text(30);
        return [
            'users_id'=>1,
            'courses_id'=>rand(1,100),
            'course_chapters_id'=>rand(1,100),
            'serial'=>rand(1,100),
            'video_title'=>$title,
            'slug'=>Str::slug($title),
            'video_link'=>$this->faker->url(),
            'is_free'=>rand(0,1),
            'video_view_count'=>0,
        ];
    }
}
