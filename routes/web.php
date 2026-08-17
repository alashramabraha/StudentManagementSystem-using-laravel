<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect ('/login');
});

Route::middleware('auth')->group(function() {


//READ ROUTES FOR STUDENT CONTROLLER
Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/distinction', [StudentController::class, 'distinction']);

Route::get('/students/reports', [StudentController::class, 'reports']);

//UPDATE ROUTES FOR STUDENT CONTROLLER
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->whereNumber('id');

Route::put('/students/{id}', [StudentController::class, 'update'])->whereNumber('id')->middleware('role:admin,staff');

//DELETE ROUTES FOR STUDENT CONTROLLER
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->whereNumber('id')->middleware('role:admin');

//CREATE ROUTES FOR STUDENT CONTROLLER
Route::get('/students/create', [StudentController::class, 'create']);

Route::post('/students', [StudentController::class, 'store'])->middleware('role:admin,staff');

//READ ROUTES FOR STUDENT CONTROLLER
Route::get('/students/{id}', [StudentController::class, 'show']);

//READ ROUTES FOR DEPARTMENT CONTROLLER
Route::get('/departments', [DepartmentController::class, 'index']);

//READ ROUTES FOR COURSE CONTROLLER
Route::get('/courses', [CourseController::class, 'index']);

Route::get('/courses/{id}/enrollment', [CourseController::class, 'enrollment']);

Route::post('/courses/{id}/enrollment/attach', [CourseController::class, 'attachStudent'])->middleware('role:admin,staff');

Route::post('/courses/{id}/enrollment/detach', [CourseController::class, 'detachStudent'])->middleware('role:admin,staff');

});

//AUTHENTICATION ROUTES FOR AUTH CONTROLLER
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);



