<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>app</title>
</head>

<body>
    <x-nav/>
    <h1>Welcome</h1>
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        @yield('content')
    </div>
    <footer>
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
</body>

</html>
