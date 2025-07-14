<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('admin.layouts.partials.header')
    <div class="flex">
        @include('admin.layouts.partials.sidebar')

        <!-- Konten Utama -->
        <main class="flex-1 p-6 bg-gray-100">
            @include('components.breadcrumb')
            @yield('content')
            @include('admin.layouts.partials.footer')
        </main>
    </div>
</body>

</html>
