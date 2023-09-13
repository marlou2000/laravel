<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('css')
</head>

<body>
    <div class="main-container">
        <div class="header-container">
            <h1>Dashboard</h1>
            <a href="/logout">Logout</a>
        </div>

        <hr style="margin: 10px 0 10px 0"/>

        <div class="links-container">
            <a href="/post">Post</a>
            |
            <a href="/create-post">Create Post</a>
            |
            <a href="/my-post">My Post</a>
        </div>

        @yield('content')
    </div>

    @yield('js')
</body>

</html>