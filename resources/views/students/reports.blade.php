@extends('layouts.app')

@section('title', 'Courses')

@section('content')

    <br><br>

    <h1>Student Reports</h1>

    <h2>Total Students: {{ $totalstudents }}</h2>


    <hr>

    <h2>CS and SE Students</h2>

    @foreach ($CSSEstudents as $student)
        <p>
            {{ $student->name }} -
            {{ $student->department }}
        </p>
    @endforeach


    <hr>

    <h2>Students NOT in CS or SE</h2>

    @foreach ($otherstudents as $student)
        <p>
            {{ $student->name }} -
            {{ $student->department }}
        </p>
    @endforeach


    <hr>

    <h2>Female Students</h2>

    @foreach ($femalestudents as $student)
        <p>
            {{ $student->name }} -
            Age: {{ $student->age }}
        </p>
    @endforeach


    <hr>

    <h2>Student Records</h2>

    @foreach ($selectedstudents as $student)
        <p>
            {{ $student->name }} -
            {{ $student->department }} -
            GPA: {{ $student->gpa }}
        </p>
    @endforeach


    <hr>

    <h2>Student Names</h2>

    @foreach ($names as $name)
        <p>{{ $name }}</p>
    @endforeach


    <hr>

    <a href="/students">Back to Students</a>
    <br><br>
    <a><form action="/logout" method="POST" class="nav-btn">
                    @csrf
                    <button type="submit">Logout</button>
            </form></a>

@endsection