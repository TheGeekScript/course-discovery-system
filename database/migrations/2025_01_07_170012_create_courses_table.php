<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('instructor');
            $table->string('category');
            $table->enum('difficulty_level', ['Beginner', 'Intermediate', 'Advanced']);
            $table->integer('duration');
            $table->float('rating')->nullable();
            $table->enum('course_format', ['Video', 'Text-based', 'Interactive/Live']);
            $table->boolean('certification_available');
            $table->date('release_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
