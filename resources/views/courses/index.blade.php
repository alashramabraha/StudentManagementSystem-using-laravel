@extends('layouts.app')

@section('title', 'Courses')

@section('content')


    <main class="container">

        <section class="page-header">

            <div>

                <p class="eyebrow">
                    ACADEMIC PROGRAMS
                </p>

                <h1>Courses</h1>

                <p class="page-description">
                    View courses and the students enrolled in each course.
                </p>

            </div>

        </section>


        @foreach ($courses as $course)

            <section class="card" style="margin-bottom: 25px;">

                <div class="section-header">

                    <h2>
                        {{ $course->name }}
                    </h2>

                    <p>

                        Course Code:
                        <strong>
                            {{ $course->course_code }}
                        </strong>

                        &nbsp; | &nbsp;

                        Credit Hours:
                        <strong>
                            {{ $course->credit_hours }}
                        </strong>

                        &nbsp; | &nbsp;

                        Enrolled Students:
                        <strong>
                            {{ $course->students->count() }}
                        </strong>

                    </p>

                    <br>

                    <a href="/courses/{{ $course->id }}/enrollment"
                        class="btn btn-primary">

                        Manage Enrollment

                    </a>

                </div>


                <div class="table-wrapper">

                    <table class="data-table">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Student</th>

                                <th>Email</th>

                                <th>Department</th>

                                <th>GPA</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($course->students as $student)

                                <tr>

                                    <td>
                                        #{{ $student->id }}
                                    </td>


                                    <td>

                                        <div class="student-cell">

                                            <div class="avatar">

                                                {{ strtoupper(substr($student->name, 0, 1)) }}

                                            </div>

                                            <div>

                                                <strong>
                                                    {{ $student->name }}
                                                </strong>

                                                <small>
                                                    {{ ucfirst($student->gender ?? 'N/A') }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    <td>
                                        {{ $student->email }}
                                    </td>


                                    <td>

                                        @if ($student->department_id)

                                            <span class="badge badge-blue">
                                                {{ $student->department()->first()?->name ?? 'Not Assigned' }}
                                            </span>

                                        @else

                                            <span class="badge badge-gray">
                                                Not Assigned
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <span class="gpa
                                            {{ $student->gpa >= 3.5 ? 'excellent' : '' }}">

                                            {{ number_format($student->gpa, 2) }}

                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="empty-state">

                                        <div class="empty-icon">
                                            📚
                                        </div>

                                        <h3>
                                            No students enrolled
                                        </h3>

                                        <p>
                                            No students are currently enrolled
                                            in this course.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

        @endforeach

    </main>


    <footer class="footer">

        <div class="container footer-content">

            <p>
                © {{ date('Y') }} Student Management System
            </p>

            <p>
                Many-to-Many Relationship
            </p>

        </div>

    </footer>

@endsection