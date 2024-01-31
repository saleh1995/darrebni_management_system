<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Http\Traits\ApiResponseTrait;

class CourseController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::with('trainingBatches')->get();
        return $this->ApiResponse(CourseResource::collection($data), 'All Courses');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $data = Course::create([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        return $this->ApiResponse(CourseResource::make($data), 'Course Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $data = Course::with('trainingBatches')->findOrFail($course->id);
        return $this->ApiResponse(CourseResource::make($data), 'Course Showed Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        return $this->ApiResponse(CourseResource::make($course), 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->ApiResponse(null, 'Course deleted successfully');
    }
}
