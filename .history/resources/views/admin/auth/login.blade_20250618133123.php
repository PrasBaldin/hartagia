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
    <div id="app" class="h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md mx-auto">
            @include('components.alerts')

            <div class="bg-white p-6 bg-white shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2>
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    {{ csrf_field() }}

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-gray-700 font-semibold">Username</label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-700 font-semibold">Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                        <label class="ml-2 text-gray-600">Remember Me</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        Login
                    </button>
                </form>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="inline-flex items-center text-gray-500 hover:text-blue-500 transition">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ml-2">Back to home page</span>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
