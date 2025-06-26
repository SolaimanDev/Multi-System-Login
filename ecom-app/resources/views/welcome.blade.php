<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Ecommerce App</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="bg-white text-gray-800 antialiased font-sans">

    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900">Welcome to <span class="text-blue-600">Ecommerce</span></h1>
            <p class="mt-2 text-gray-600">Single Sign-On Demo using JWT and Laravel</p>
        </div>

        <div class="space-x-4">
            @auth
                <a href="{{ url('/home') }}"
                   class="px-5 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">Dashboard</a>
                <a href="{{ url('/logout') }}"
                   class="px-5 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition">Logout</a>
            @else
                <a href="{{ route('login') }}"
                   class="px-5 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-5 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700 transition">Register</a>
                @endif
            @endauth
        </div>
    </div>

</body>
</html>
