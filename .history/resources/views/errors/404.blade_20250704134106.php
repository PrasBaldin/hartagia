<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404!</title>

    <link rel="alternate" hreflang="en" href="{{ url('/en') }}">
    <link rel="alternate" hreflang="id" href="{{ url('/id') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="text-center py-20">
        <h1 class="text-5xl font-bold text-red-600 mb-4">
            {{ __('errors.404.code') }}
        </h1>
        <p class="text-xl text-gray-700 mb-6">
            {{ __('errors.404.message') }}
        </p>
        <p class="text-xl text-gray-700 mb-6">
            {{ __('errors.404.description') }}
        </p>
        <a href="{{ url('/') }}" class="text-blue-500 hover:underline">
            {{ __('errors.404.back_to_home') }}
        </a>
    </div>
</body>

</html>
