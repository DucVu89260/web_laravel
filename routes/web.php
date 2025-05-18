<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('process_login');


Route::group([
    'middleware' => \App\Http\Middleware\CheckLoginMiddleware::class,
], function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('courses', CourseController::class)->except([
        'show',
        'destroy',
    ]);

    // Route::get('courses/api',[CourseController::class,'api'])->name('courses.api');
    Route::get('courses/api/name',[CourseController::class,'apiName'])->name('courses.api.name');

    // Route::get('/test', function () {
    //     return view('layout.master');
    // });
    
    Route::resource('students', StudentController::class)->except([
        'show',
        'destroy',
    ]);

    Route::group([
        'middleware' => \App\Http\Middleware\CheckSuperAdminMiddleware::class,
    ], function () {
        Route::delete('courses/{course}', [AuthController::class,'destroy'])->name('courses.destroy');
        Route::delete('students/{student}', [AuthController::class,'destroy'])->name('students.destroy');
    });
        
});