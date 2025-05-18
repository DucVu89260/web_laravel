<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class StudentController extends Controller
{
    private $model;

    public function __construct()
    {   
        $this->model = new Student();

        $routeName  = request()->route()->getName();

        $arr        = explode('.', $routeName);
        $arr        = array_map('ucfirst', $arr);
        $title      = implode(' - ', $arr);

        $arrStudentStatus= StudentStatusEnum::getArrayView();

        View::share('title', $title);
        View::share('arrStudentStatus', $arrStudentStatus);
    }

    public function index(Request $request)
    {   
        $search = $request->get('q');
        $selectedStatus= (int) $request->get('status');
        // dd($selectedStatus);    

        $query = Student::with('course');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($selectedStatus > 0) {
            $query->where('status', '=', $selectedStatus);
        }
        
        $data = $query
            // ->ddRawSql()
            // ->where('status', $selectedStatus)
            ->paginate(8)
            ->appends([
                'q' => $search,
                'status' => $selectedStatus
            ]);

        return view('student.index', [
            'data' => $data,
            'search' => $search,
            'selectedStatus' => $selectedStatus,
        ]);
    }


    public function create()
    {   
        $courses = Course::query()->get();
        return view('student.create',[
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        $arr = $request -> validated();
        $arr['avatar'] = $path;

        $this->model::create($arr);
        
        return redirect()->route('students.index')->with('success', 'student created successfully'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
