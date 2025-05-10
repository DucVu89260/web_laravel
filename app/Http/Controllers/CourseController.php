<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::query()->get();
        return view('course.index', [
            'data'=> $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $object = new Course();
        // $object->fill($request->except('_token'));
        // $object->save();

        Course::create($request->except('_token'));
        
        return redirect()->route('courses.index')->with('success', 'Course created successfully'); 
    }

    /**
     * Display the specified resource.
     */
    // public function show(Course $course)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        // $object = Course::where('id', $course->id)->first();
        // $object = Course::find($course->id);
        // $object = Course::find($course);
        return view('course.edit', [
            'each' => $course,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // $request->validate();

        // Course::where('id', $course->id)
        // ->update($request -> except('_token', '_method'));

        $course->update($request->except(
            '_token',
            '_method'
        ));

        // $course->fill($request->except('_token'));
        // $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Course::destroy($course->id);
        // Course::where('id', $course->id)->delete();
        // dd($course);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
