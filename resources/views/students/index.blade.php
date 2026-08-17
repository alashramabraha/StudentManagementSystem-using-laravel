@extends('layouts.app')

@section('title', 'Courses')

@section('content')    


    <!-- ==================== MAIN CONTENT ==================== -->

    <main class="container">

        <!-- Page Header -->

        <section class="page-header">

            <div>
                <p class="eyebrow">STUDENT MANAGEMENT SYSTEM</p>

                <h1>Students</h1>

                <p class="page-description">
                    Manage student records, departments, academic performance
                    and enrollment information.
                </p>
            </div>

            <a href="/students/create" class="btn btn-primary">
                + Add Student
            </a>

        </section>


        <!-- ==================== STATISTICS ==================== -->

        <section class="stats-grid">

            <div class="stat-card">

                <div class="stat-icon">👨‍🎓</div>

                <div>
                    <p class="stat-label">Total Students</p>
                    <h2>{{ $students->count() }}</h2>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">🏆</div>

                <div>
                    <p class="stat-label">Distinction</p>
                    <h2>
                        {{ $students->where('gpa', '>=', 3.5)->count() }}
                    </h2>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">✅</div>

                <div>
                    <p class="stat-label">Active Students</p>
                    <h2>
                        {{ $students->where('is_active', 1)->count() }}
                    </h2>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">📚</div>

                <div>
                    <p class="stat-label">Student Records</p>
                    <h2>{{ $students->count() }}</h2>
                </div>

            </div>

        </section>


        <!-- ==================== QUICK ACTIONS ==================== -->

        <section class="quick-actions">

            <a href="/students/distinction" class="quick-card">

                <div class="quick-icon">🏆</div>

                <div>
                    <h3>Distinction Holders</h3>
                    <p>View students with GPA 3.5 or above.</p>
                </div>

                <span class="arrow">→</span>

            </a>


            <a href="/students/reports" class="quick-card">

                <div class="quick-icon">📊</div>

                <div>
                    <h3>Student Reports</h3>
                    <p>View statistics and student reports.</p>
                </div>

                <span class="arrow">→</span>

            </a>


            <a href="/departments" class="quick-card">

                <div class="quick-icon">🏛️</div>

                <div>
                    <h3>Departments</h3>
                    <p>Explore departments and their students.</p>
                </div>

                <span class="arrow">→</span>

            </a>


            <a href="/courses" class="quick-card">

                <div class="quick-icon">📚</div>

                <div>
                    <h3>Courses</h3>
                    <p>Manage courses and student enrollment.</p>
                </div>

                <span class="arrow">→</span>

            </a>

        </section>


        <!-- ==================== STUDENT TABLE ==================== -->

        <section class="card">

            <div class="section-header">

                <div>
                    <h2>All Students</h2>

                    <p>
                        Browse, filter and manage student records.
                    </p>
                </div>

            </div>


            <!-- ==================== FILTERS ==================== -->

            <form action="/students" method="GET" class="filters">

                <div class="filter-group">

                    <label for="sort">
                        Sort By
                    </label>

                    <select name="sort" id="sort">

                        <option value="id"
                            {{ $sort == 'id' ? 'selected' : '' }}>
                            ID
                        </option>

                        <option value="name"
                            {{ $sort == 'name' ? 'selected' : '' }}>
                            Name
                        </option>

                        <option value="age"
                            {{ $sort == 'age' ? 'selected' : '' }}>
                            Age
                        </option>

                        <option value="gpa"
                            {{ $sort == 'gpa' ? 'selected' : '' }}>
                            GPA
                        </option>

                        <option value="created_at"
                            {{ $sort == 'created_at' ? 'selected' : '' }}>
                            Registration Date
                        </option>

                    </select>

                </div>


                <div class="filter-group">

                    <label for="department">
                        Department
                    </label>

                    <select name="department" id="department">

                        <option value="">
                            All Departments
                        </option>

                        @php
                            $departments = \App\Models\Department::all();
                        @endphp

                        @foreach ($departments as $department)

                            <option value="{{ $department->id }}"
                                {{ request('department') == $department->id ? 'selected' : '' }}>

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="filter-actions">

                    <button type="submit" class="btn btn-primary">
                        Apply Filters
                    </button>

                    <a href="/students" class="btn btn-light">
                        Reset
                    </a>

                </div>

            </form>


            <!-- ==================== TABLE ==================== -->

            <div class="table-wrapper">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Student</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Department</th>
                            <th>GPA</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($students as $student)

                            <tr>

                                <td>
                                    <span class="student-id">
                                        #{{ $student->id }}
                                    </span>
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
                                    {{ $student->age }}
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

                                    @if ($student->gpa >= 3.5)

                                        <span class="gpa excellent">
                                            {{ number_format($student->gpa, 2) }}
                                        </span>

                                    @elseif ($student->gpa >= 3.0)

                                        <span class="gpa good">
                                            {{ number_format($student->gpa, 2) }}
                                        </span>

                                    @else

                                        <span class="gpa">
                                            {{ number_format($student->gpa, 2) }}
                                        </span>

                                    @endif

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


                                <td>

                                    <div class="action-buttons">

                                        <a
                                            href="/students/{{ $student->id }}"
                                            class="action-view"
                                        >
                                            View
                                        </a>


                                        <a
                                            href="/students/{{ $student->id }}/edit"
                                            class="action-edit"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="/students/{{ $student->id }}"
                                            method="POST"
                                            class="delete-form"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-delete"
                                                onclick="return confirm('Are you sure you want to delete this student?')"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="empty-state">

                                    <div class="empty-icon">
                                        🎓
                                    </div>

                                    <h3>No students found</h3>

                                    <p>
                                        There are no students matching your
                                        current filters.
                                    </p>

                                    <a href="/students" class="btn btn-light">
                                        Clear Filters
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <!-- ==================== FOOTER ==================== -->

    <footer class="footer">

        <div class="container footer-content">

            <p>
                © {{ date('Y') }} Student Management System
            </p>

            <p>
                Laravel StudentMS
            </p>

        </div>

    </footer>

@endsection