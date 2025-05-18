<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DestroyRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    private $model;

    public function __construct()
    {   
        $this->model = new Course();

        $routeName  = request()->route()->getName();

        $arr        = explode('.', $routeName);
        $arr        = array_map('ucfirst', $arr);
        $title      = implode(' - ', $arr);

        View::share('title', $title);

    }

    public function index(Request $request)
    {
        $search = $request->get('q');
        
        $data = Course::withCount('students');

        $data = Course::query()
        ->where('name','like','%'.$search.'%')
        ->paginate(4)
        ->appends(['q' => $search]);

        // $data->appends(['q' => $search]);

        return view('course.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function apiName(Request $request)
    {   
        return $this->model
        ->where('name', 'like', '%'.$request->get('q').'%')
        ->get([
            'id',
            'name',
        ]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(StoreRequest $request)
    {
        // $object = new Course();
        // $object->fill($request->except('_token'));
        // $object->save();


        $this->model::create($request->validated());
        
        return redirect()->route('courses.index')->with('success', 'Course created successfully'); 
    }

    public function edit(Course $course)
    {
        // $object = Course::where('id', $course->id)->first();
        // $object = Course::find($course->id);
        // $object = Course::find($course);
        return view('course.edit', [
            'each' => $course,
        ]);
    }

    public function show(Course $course)
    {

    }

    public function update(UpdateRequest $request, $courseId)
    {

        // $this->model::query()
        //     ->where('id', $courseId)
        //     ->update($request->validated());

        $object = $this->model::find($courseId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }


    public function destroy(DestroyRequest $request, $courseId)
    {   

        $this->model::destroy($courseId);

        //  $this->model::where('id', $courseId)->delete();


        // $arr = [];
        // $arr['status'] = 'true';
        // $arr['message'] = '';

        // return response($arr, 200);

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
