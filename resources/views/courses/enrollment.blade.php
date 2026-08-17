<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Enrollment - {{ $course->name }}
    </title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>

<body>

<nav class="navbar">

    <div class="nav-container">

        <a href="/students" class="brand">
            🎓 StudentMS
        </a>

        <div class="nav-links">

            <a href="/students" class="nav-link">
                Students
            </a>

            <a href="/departments" class="nav-link">
                Departments
            </a>

            <a href="/courses" class="nav-link active">
                Courses
            </a>

            <form action="/logout" method="POST" class="nav-btn">
                    @csrf
                    <button type="submit">Logout</button>
            </form> 

        </div>

    </div>

</nav>


<main class="container">

    <section class="page-header">

        <div>

            <p class="eyebrow">
                COURSE ENROLLMENT
            </p>

            <h1>
                {{ $course->name }}
            </h1>

            <p class="page-description">

                {{ $course->course_code }}

                ·

                {{ $course->credit_hours }} Credit Hours

            </p>

        </div>

        <a href="/courses" class="btn btn-light">
            ← Back to Courses
        </a>

    </section>


    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <!-- =====================================
         CURRENT ENROLLMENT
         ===================================== -->

    <section class="card">

        <div class="section-header">

            <h2>
                Currently Enrolled
            </h2>

            <p>
                {{ $course->students->count() }}
                students enrolled in this course.
            </p>

        </div>


        <div class="table-wrapper">

            <table class="data-table">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($course->students as $student)

                        <tr>

                            <td>
                                #{{ $student->id }}
                            </td>

                            <td>
                                {{ $student->name }}
                            </td>

                            <td>
                                {{ $student->email }}
                            </td>

                            <td>

                                <form
                                    action="/courses/{{ $course->id }}/enrollment/detach"
                                    method="POST"
                                    class="delete-form"
                                >

                                    @csrf

                                    <input
                                        type="hidden"
                                        name="student_id"
                                        value="{{ $student->id }}"
                                    >

                                    <button
                                        type="submit"
                                        class="action-delete"
                                    >
                                        Detach
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="empty-state">

                                No students enrolled.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>


    <br>


    <!-- =====================================
         ATTACH
         ===================================== -->

    <section class="card">

        <div class="section-header">

            <h2>
                Attach Student
            </h2>

            <p>
                Enroll one student into this course.
            </p>

        </div>


        <form
            action="/courses/{{ $course->id }}/enrollment/attach"
            method="POST"
            style="padding: 25px;"
        >

            @csrf

            <label for="student_id">
                Select Student
            </label>

            <select
                name="student_id"
                id="student_id"
                required
            >

                <option value="">
                    Select a student
                </option>

                @foreach ($students as $student)

                    <option value="{{ $student->id }}">

                        {{ $student->name }}
                        -
                        {{ $student->email }}

                    </option>

                @endforeach

            </select>

            <br><br>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Attach Student
            </button>

        </form>

    </section>


    <br>

</main>


<footer class="footer">

    <div class="container footer-content">

        <p>
            © {{ date('Y') }} Student Management System
        </p>

        <p>
            Many-to-Many Enrollment
        </p>

    </div>

</footer>

</body>

</html>