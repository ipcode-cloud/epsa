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
    <div class="w-full h-screenflex flex-col items-center justify-center bg-gray-100">
        <header class="bg-gray-800 text-white p-4 sticky top-0 w-full flex flex-row items-center justify-around">
            <h1 class="text-2xl font-bold">My Application</h1>
            <x-nav />
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="bg-gray-800 text-white bottom-0 p-4 text-center">
            <p>&copy; 2023 Your Company. All rights reserved.</p>
            <p>Contact us at: <a href="epsa.com"></p>
            <p>Follow us on social media:</p>
            <ul>
                <li><a href="https://www.facebook.com/yourcompany">Facebook</a></li>
                <li><a href="https://www.twitter.com/yourcompany">Twitter</a></li>
                <li><a href="https://www.instagram.com/yourcompany">Instagram</a></li>
                <li><a href="https://www.linkedin.com/company/yourcompany">LinkedIn</a></li>
            </ul>
        </footer>
        @yield('scripts')
    </div>
</body>

</html>
