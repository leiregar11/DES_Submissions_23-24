<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
</head>
<body>

    <header>
        <nav>
            <!-- Your navigation bar goes here -->
            <ul>
                <li><a href="/">Task List</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Yield content from child views -->
        @yield('content')
    </main>

</body>
</html>
