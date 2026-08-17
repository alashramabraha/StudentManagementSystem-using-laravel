@extends('layouts.app')

@section('title', 'Courses')

@section('content')
        <br><br>
        <h1>Edit Student Details<h1>
            <br><br>

            <form action="/students/{{ $student->id }}" method="POST">

                @csrf
                @method('PUT')

                 <label>Name</label>
                <input type="text"
                    name="name"
                     value="{{ $student->name }}">

                <label>Email</label>
        <input type="email"
               name="email"
               value="{{ $student->email }}">

        <label>Age</label>
        <input type="number"
               name="age"
               value="{{ $student->age }}">

        <label>Department</label>
        <input type="text"
               name="department"
               value="{{ $student->department }}">

        <label>Phone Number</label>
        <input type="text"
               name="phone_number"
               value="{{ $student->phone_number }}">

        <label>GPA</label>
        <input type="number"
               step="0.01"
               name="gpa"
               value="{{ $student->gpa }}">

        <button type="submit">
            Update Student
        </button>

    </form>

    <br>

    <a href="/students">Cancel</a>

@endsection


