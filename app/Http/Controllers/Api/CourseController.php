<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request) {

        $query = Course::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('price') && $request->price != '') {
            if ($request->price == 'free') {
                $query->where('price', 0);
            } elseif ($request->price == 'paid') {
                $query->where('price', '>', 0);
            } elseif ($request->price == 'range') {
                $query->whereBetween('price', [1000, 3000]);
            }
        }

        if ($request->has('difficulty') && $request->difficulty != '') {
            $query->where('difficulty_level', $request->difficulty);
        }

        if ($request->has('duration') && $request->duration != '') {
            if ($request->duration == '<2') {
                $query->where('duration', '<', 120);
            } elseif ($request->duration == '2-5') {
                $query->whereBetween('duration', [120, 300]);
            } elseif ($request->duration == '5-10') {
                $query->whereBetween('duration', [300, 600]);
            } elseif ($request->duration == '>10') {
                $query->where('duration', '>', 600);
            }
        }

        if ($request->has('rating') && $request->rating != '') {
            if ($request->rating == '4+') {
                $query->where('rating', '>=', 4);
            } elseif ($request->rating == '3+') {
                $query->where('rating', '>=', 3);
            } elseif ($request->rating == '2') {
                $query->where('rating', '<=', 2);
            }
        }

        if ($request->has('format') && $request->format != '') {
            $query->where('course_format', $request->format);
        }

        if ($request->has('release_date') && $request->release_date != '') {
            $date = now();
            if ($request->release_date == '30_days') {
                $date = now()->subDays(30);
            } elseif ($request->release_date == '6_months') {
                $date = now()->subMonths(6);
            } elseif ($request->release_date == '1_year') {
                $date = now()->subYear();
            }
            $query->where('release_date', '>=', $date);
        }

        $courses = $query->get();

        return response()->json($courses);
    }
    
    public function show($id) {
        return Course::findOrFail($id);
    }
    
    public function store(Request $request) {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }
    
    public function update(Request $request, $id) {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return response()->json($course, 200);
    }
    
    public function destroy($id) {
        Course::destroy($id);
        return response()->json(null, 204);
    }
}
