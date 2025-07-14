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

<body class="relative font-sans antialiased min-h-screen overflow-hidden">
    <!-- Background untuk mobile -->
    <img src="{{ asset('images/bg-error-mobile.png') }}" class="absolute inset-0 w-full h-full object-cover z-0 block lg:hidden" alt="Mobile Background">

    <!-- Background untuk desktop -->
    <img src="{{ asset('images/bg-error-desktop.png') }}" class="absolute inset-0 w-full h-full object-cover z-0 hidden lg:block" alt="Desktop Background">

    <div class="relative z-10 h-screen flex items-center justify-center lg:justify-end px-6 lg:px-20 bg-gray-800/40 backdrop-blur-sm">
        <div class="text-center lg:text-left lg:w-1/2">
            <h1 class="text-5xl font-bold text-red-500 mb-4">
                Error {{ __('error.404.code') }}!
            </h1>
            <p class="text-xl text-gray-200 mb-6">
                {{ __('error.404.message') }}
            </p>
            <p class="text-xl text-gray-200 mb-6">
                {{ __('error.404.description') }}
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary">
                {{ __('error.404.back_to_home') }}
            </a>
        </div>
    </div>
</body>

</html>
