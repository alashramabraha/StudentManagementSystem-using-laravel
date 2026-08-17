<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'StudentMS')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar">

        <a href="/students" class="brand">
            🎓 StudentMS
        </a>

        <div class="nav-links">

            <a href="/students">Students</a>

            <a href="/departments">Departments</a>

            <a href="/courses">Courses</a>

            <a href="/students/distinction">Distinction</a>

            <a href="/students/reports">Reports</a>

            @auth
                <form action="/logout" method="POST" class="logout-form">
                    @csrf

                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            @endauth

        </div>

    </nav>


    <main class="page-container">

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>