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
            <div class="flex items-center space-x-4">
                <!-- Toggle Sidebar -->
                <button onclick="toggleSidebar()" class="text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <!-- Branding -->
                <a href="{{ url('/') }}" class="text-lg font-semibold">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

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
                <ul id="sidebarMenu">
                    <li class="mb-2">
                        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-briefcase"></i>
                            <span class="menu-text">Portfolio</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-cog"></i>
                            <span class="menu-text">Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Konten Utama -->
            <main class="flex-1 p-6 bg-gray-100">
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
            let menuItems = document.querySelectorAll(".menu-text");
            let menuLinks = document.querySelectorAll("#sidebarMenu a");

            if (sidebar.classList.contains("w-64")) {
                sidebar.classList.remove("w-64");
                sidebar.classList.add("w-16");
                menuItems.forEach(item => item.classList.add("hidden"));
                menuLinks.forEach(link => link.classList.add("justify-center"));
            } else {
                sidebar.classList.remove("w-16");
                sidebar.classList.add("w-64");
                menuItems.forEach(item => item.classList.remove("hidden"));
                menuLinks.forEach(link => link.classList.remove("justify-center"));
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
