<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'instructor' => $this->faker->name,
            'category' => $this->faker->randomElement(['Programming', 'Design', 'Business', 'Marketing']),
            'difficulty_level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'duration' => $this->faker->numberBetween(60, 600),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'course_format' => $this->faker->randomElement(['Video', 'Text-based', 'Interactive/Live']),
            'certification_available' => $this->faker->boolean,
            'release_date' => $this->faker->date(),
        ];
    }
}