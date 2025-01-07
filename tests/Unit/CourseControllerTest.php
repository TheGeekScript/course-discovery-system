<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_course()
    {
        $courseData = [
            'title' => 'Introduction to PHP',
            'description' => 'Learn the basics of PHP programming.',
            'price' => 5000,
            'instructor' => 'John Doe',
            'category' => 'Programming',
            'difficulty_level' => 'Beginner',
            'duration' => 120,
            'rating' => 4.5,
            'course_format' => 'Video',
            'certification_available' => true,
            'release_date' => '2024-01-07',
        ];

        $response = $this->postJson('/api/courses', $courseData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('courses', $courseData);
    }

    public function it_can_list_courses()
    {
        Course::factory()->create(['title' => 'Course 1']);
        Course::factory()->create(['title' => 'Course 2']);

        $response = $this->getJson('/api/courses');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

    public function it_can_show_a_course()
    {
        $course = Course::factory()->create();

        $response = $this->getJson('/api/courses/' . $course->id);

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $course->title]);
    }

    public function it_can_update_a_course()
    {
        $course = Course::factory()->create();

        $updatedData = [
            'title' => 'Updated Course Title',
            'description' => 'Updated description.',
            'price' => 4000,
            'instructor' => 'Jane Doe',
            'category' => 'Design',
            'difficulty_level' => 'Intermediate',
            'duration' => 150,
            'rating' => 4.8,
            'course_format' => 'Text-based',
            'certification_available' => false,
            'release_date' => '2025-01-07',
        ];

        $response = $this->putJson('/api/courses/' . $course->id, $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('courses', $updatedData);
    }

    public function it_can_delete_a_course()
    {
        $course = Course::factory()->create();

        $response = $this->deleteJson('/api/courses/' . $course->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('courses', ['id' => $course->id]);
    }

    public function it_can_search_courses()
    {
        Course::factory()->create(['title' => 'Learn PHP']);
        Course::factory()->create(['title' => 'Advanced JavaScript']);

        $response = $this->getJson('/api/courses?search=PHP');

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => 'Learn PHP']);
        $response->assertJsonMissing(['title' => 'Advanced JavaScript']);
    }
}