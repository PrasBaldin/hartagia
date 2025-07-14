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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="bg-gray-800 text-white flex justify-between items-center px-6 py-4">
            <!-- Branding -->
            <a href="{{ url('/') }}" class="text-lg font-semibold">
                {{ config('app.name', 'Laravel') }}
            </a>

            <!-- Logout Button -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </nav>

        <div class="flex">
            <!-- Sidebar -->
            <aside id="sidebar" class="w-64 h-screen bg-gray-900 text-white transition-all duration-300 p-4">
                <button onclick="toggleSidebar()" class="text-white mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <ul id="sidebarMenu">
                    <li class="mb-2">
                        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Portfolio</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Pengaturan</a>
                    </li>
                </ul>
            </aside>

            <!-- Konten Utama -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        // Toggle Sidebar
        function toggleSidebar() {
            let sidebar = document.getElementById("sidebar");
            let menu = document.getElementById("sidebarMenu");

            if (sidebar.classList.contains("w-64")) {
                sidebar.classList.remove("w-64");
                sidebar.classList.add("w-16");
                menu.style.display = "none";
            } else {
                sidebar.classList.remove("w-16");
                sidebar.classList.add("w-64");
                menu.style.display = "block";
            }
        }

        // Konfirmasi Hapus SweetAlert
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Data tidak bisa dikembalikan setelah dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</body>

</html>
