<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('students')->get();
        return view ('courses.index', compact ('courses'));
    }

    public function enrollment($id)
    {
        $course = Course::findOrFail($id);
        $students = Student::orderBy('name')->get();
        return view ('courses.enrollment', compact ('course', 'students'));
    }

    public function attachStudent(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->students()->attach($request->student_id);
        return redirect ("/courses/$id/enrollment")->with('success', 'Student enrolled successfully');
    }

    public function detachStudent(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->students()->detach($request->student_id);
        return redirect ("/courses/$id/enrollment")->with('success', 'Student removed from the course');
    }
}
