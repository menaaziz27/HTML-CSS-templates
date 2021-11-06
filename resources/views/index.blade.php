<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <title>Home</title>
    </head>
    <body class="bg-blue-100 flex justify-center items-center h-screen w-full">
        <div class="container flex flex-col items-center">
            <p class="text-5xl text-black font-bold block mb-4">Home</p>
            <div class="block">
                <a
                    href="/login"
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow"
                    >Login</a
                >
                <a
                    href="/register"
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow"
                    >Register</a
                >
                <a
                    href="/dashboard"
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow"
                    >Dashboard</a
                >
            </div>
        </div>
    </body>
</html>
