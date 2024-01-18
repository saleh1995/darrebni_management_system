<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StorecourseRequest;
use App\Http\Requests\UpdatecourseRequest;
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
        $data = Course::all();
        return $this->ApiResponce(CourseResource::collection($data), 'All Courses');
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
        return $this->ApiResponce(CourseResource::make($data), 'Course Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $data = Course::findOrFail($course->id);
        return $this->ApiResponce(CourseResource::make($data), 'Course Showed Successfully');
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
        return $this->ApiResponce(CourseResource::make($course), 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->ApiResponce(null, 'Course deleted successfully');
    }
}
