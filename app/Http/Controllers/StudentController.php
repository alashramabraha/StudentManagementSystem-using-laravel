<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'id');
        $department = $request->query('department');

        $allowedSorts = ['id', 'name', 'age', 'gpa', 'created_at'];

        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }

        $query = Student::query();

        if ($department) {
        $query->where('department', $department);
        }

        $students = $query->orderBy($sort)->get();

        return view ('students.index', compact('students', 'sort', 'department'));
    }

    public function create()
    {
        return view ('students.create');
    }

    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'department' => $request->department,
            'gender' => $request->gender,
        ]);
        return redirect ('/students');
    }

    public function show($id)
    {
        $student = Student::with('profile')->findOrFail($id);
        return view ('students.show', compact('student'));
    }

    public function distinction()
    {
        $students = Student::where('gpa', '>=', 3.5)->orderBy('gpa', 'desc')->get();
        return view('students.distinction', compact('students'));
    }

    public function reports()
    {
        $totalstudents = Student::count();

        $CSSEstudents = Student::whereIn('department', ['CS', 'SE'])->get();

        $otherstudents = Student::whereNotIn('department', ['CS', 'SE'])->get();

        $femalestudents = Student::where('gender', 'female')->whereBetween('age', [20, 30])->get();

        $selectedstudents = Student::select('name', 'department', 'gpa')->where('gpa', '>=', 3.0)->get();

        $names = Student::pluck('name');

        return view('students.reports', compact('totalstudents', 'CSSEstudents', 'otherstudents', 'femalestudents', 'selectedstudents', 'names'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

         $student->update([
                'name' => $request->name,
             'email' => $request->email,
                'age' => $request->age,
                'department' => $request->department,
                'phone_number' => $request->phone_number,
                'gpa' => $request->gpa,
             ]);

        return redirect('/students');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/students');
    }
}
