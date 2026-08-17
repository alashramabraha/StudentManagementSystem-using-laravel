@extends('layouts.app')

@section('title', 'Courses')

@section('content')
        <br>
        <br>
        <h1>Add Student</h1>
        <form action=/students method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="phone_number">Phone:</label>
        <input type="text" name="phone_number" id="phone">
        <br><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age">
        <br><br>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department">
        <br><br>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <br><br><br>
        <button type="submit">Add Student</button>
        </form>
@endsection