<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <p>Contact us at: <a href="epsa.com"></p>
        <p>Follow us on social media:</p>
        <ul>
            <li><a href="https://www.facebook.com/yourcompany">Facebook</a></li>
            <li><a href="https://www.twitter.com/yourcompany">Twitter</a></li>
            <li><a href="https://www.instagram.com/yourcompany">Instagram</a></li>
            <li><a href="https://www.linkedin.com/company/yourcompany">LinkedIn</a></li>
        </ul>
    </footer>
    <script src="automate.js"></script>
</body>

</html>
