<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - StudentMS</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>

<body>

    <h1>Student Management System</h1>

    <h2>Login</h2>

    @if ($errors->any())
        <div class="error">

            @foreach ($errors->all() as $error)
                <p> {{ $error }} </p>
            @endforeach
        </div>    
    @endif        

    <form action="/login" method="POST">

        @csrf

        <label>Email</label>

        <input
            type="email"
            name="email"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Login
        </button>  

    </form>

</body>

</html>