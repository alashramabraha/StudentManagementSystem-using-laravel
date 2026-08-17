@extends('layouts.app')

@section('title', 'Courses')

@section('content')


    <!-- MAIN -->

    <main class="container">

        <section class="page-header">

            <div>

                <p class="eyebrow">
                    ACADEMIC STRUCTURE
                </p>

                <h1>Departments</h1>

                <p class="page-description">
                    View departments and the students belonging to each department.
                </p>

            </div>

        </section>


        <!-- DEPARTMENTS -->

        <section class="stats-grid">

            @foreach ($departments as $department)

                <div class="stat-card">

                    <div class="stat-icon">
                        🏛️
                    </div>

                    <div>

                        <p class="stat-label">
                            Department
                        </p>

                        <h2>
                            {{ $department->name }}
                        </h2>

                        <p class="stat-label">
                            {{ $department->students->count() }} students
                        </p>

                    </div>

                </div>

            @endforeach

        </section>


        <!-- STUDENTS BY DEPARTMENT -->

        @foreach ($departments as $department)

            <section class="card" style="margin-bottom: 25px;">

                <div class="section-header">

                    <h2>
                        {{ $department->name }}
                    </h2>

                    <p>
                        Students enrolled in this department:
                        <strong>
                            {{ $department->students->count() }}
                        </strong>
                    </p>

                </div>


                <div class="table-wrapper">

                    <table class="data-table">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Student</th>

                                <th>Email</th>

                                <th>GPA</th>

                                <th>Status</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($department->students as $student)

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

                                        <span class="gpa
                                            {{ $student->gpa >= 3.5 ? 'excellent' : '' }}">

                                            {{ number_format($student->gpa, 2) }}

                                        </span>

                                    </td>

                                    <td>

                                        @if ($student->is_active)

                                            <span class="status active">
                                                Active
                                            </span>

                                        @else

                                            <span class="status inactive">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="empty-state">

                                        <div class="empty-icon">
                                            🎓
                                        </div>

                                        <h3>
                                            No students
                                        </h3>

                                        <p>
                                            No students are currently assigned
                                            to this department.
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


    <!-- FOOTER -->

    <footer class="footer">

        <div class="container footer-content">

            <p>
                © {{ date('Y') }} Student Management System
            </p>

            <p>
                One-to-Many Relationship
            </p>

        </div>

    </footer>

@endsection