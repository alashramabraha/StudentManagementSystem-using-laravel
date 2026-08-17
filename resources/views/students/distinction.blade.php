@extends('layouts.app')

@section('title', 'Courses')

@section('content')
        <br>
        <br>
        <h1>Distinction Holders</h1>
        <br><br>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->gpa }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4">No students found.</td>
                    </tr>    
                @endforelse
            </tbody>
        </table>

             <p>Return to <a href="/students">All Students</a></p>

@endsection  