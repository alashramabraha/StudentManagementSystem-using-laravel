@extends('layouts.app')

@section('title', 'Courses')

@section('content')
        <br>
        <br>
        <br>
        <h1>Student Details</h1>
        <br><br>
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Phone:</strong> {{ $student->phone_number }}</p>
        <p><strong>Age:</strong> {{ $student->age }}</p>
        <p><strong>Department:</strong> {{ $student->department }}</p>
        <p><strong>Gender:</strong> {{ $student->gender }}</p>
        <p><strong>Address:</strong> {{ $student->address }}</p>    
        <P><strong>GPA:</strong> {{ $student->gpa }}</p>
        <p><strong>Date of birth:</strong> {{ $student->date_of_birth }}</p>
        <p><strong>Active:</strong> {{ $student->is_active }}</p>
        <br><br>
        <section class="card">

            <div class="section-header">

                <div>

                    <p class="eyebrow">
                         STUDENT PROFILE
                     </p>

                     <h2>
                        Personal Information
                     </h2>

                 </div>

            </div>


         @if ($student->profile)

            <div class="profile-grid">

                <div>
                    <strong>Address</strong>
                    <p>
                        {{ $student->profile->address ?? 'Not provided' }}
                    </p>
                 </div>


                 <div>
                    <strong>Phone Number</strong>
                    <p>
                     {{ $student->profile->phone_number ?? 'Not provided' }}
                    </p>
                 </div>


                <div>
                    <strong>Bio</strong>
                    <p>
                        {{ $student->profile->bio ?? 'No biography available' }}
                     </p>
                </div>

             </div>

         @else

            <p>
                No student profile has been created for this student.
            </p>

         @endif

</section>
        <br><br>
        <a href="/students">Back to Students List</a>


        @endsection