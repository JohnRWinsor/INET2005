<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SuperHero Weapons</title>

    <!-- Add your stylesheets, scripts, etc. here -->
    <link rel='stylesheet' type='text/css' href='{{ asset('css/app.css') }}'>
    <!-- Add any additional stylesheets or scripts here -->

    <style>
        /* Add custom styles for the header and navigation bar */
        header {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            background-color: #444;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        nav a:hover {
            background-color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <header>
        <h1>SuperHero Weapons</h1>
    </header>

    <nav>
        <a href="{{ url('/categories') }}">Categories</a>
        <a href="{{ url('/items') }}">Items</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>