<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta description="{{ $contact->site_name ? $contact->site_name : config('app.name', 'Harta Gemilang') }}">
    <meta name="keywords" content="{{ $contact->site_keywords ? $contact->site_keywords : 'Harta Gemilang, Construction, Services, Pengadaan, Konstruksi' }}">

    <title>{{ $contact->site_name ? $contact->site_name : config('app.name', 'Harta Gemilang') }}</title>

    @if (!empty($contact->favicon))
        <link rel="icon" type="image/x-icon" href="{{ asset($contact->favicon) }}">
    @endif

    <link rel="alternate" hreflang="en" href="{{ url('/en') }}">
    <link rel="alternate" hreflang="id" href="{{ url('/id') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    @include('layouts.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
</body>

</html>

{{-- linguist trigger --}}
