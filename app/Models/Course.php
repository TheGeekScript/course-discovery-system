<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Course extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'price',
        'instructor',
        'category',
        'difficulty_level',
        'duration',
        'rating',
        'course_format',
        'certification_available',
        'release_date',
    ];
}
