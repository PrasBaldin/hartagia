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
        <div class="h-[51px] relative z-30"></div>
        <nav class="fixed top-0 z-50 w-full bg-gray-800 text-white flex justify-between items-center px-8 py-4">
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
                <button type="button" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded flex items-center gap-2"
                    onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>

        <div class="flex">
            <!-- Sidebar -->
            <div id="sidebarOverlay" class="w-64 transition-all duration-300"></div>
            <aside id="sidebar" class="w-64 h-screen fixed left-0 top-0 z-20 bg-gray-900 text-white transition-all duration-300 p-4">
                <ul id="sidebarMenu" class="mt-[51px]">
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.services') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-briefcase"></i>
                            <span class="menu-text">Layanan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.portfolio') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-image"></i>
                            <span class="menu-text">Portfolio</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.settings') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                            <i class="fas fa-cog"></i>
                            <span class="menu-text">Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Konten Utama -->
            <main class="flex-1 p-6 bg-gray-100">
                <!-- Breadcrumb -->
                @if(Request::path() !== 'admin/dashboard')
                <div class="flex items-center my-6 p-8">
                    <nav class="flex" aria-label="breadcrumb">
                        <ol class="inline-flex items-center space-x-1">
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 transition">Admin</a>
                            </li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                </div>
                @endif
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
            let sidebarOverlay = document.getElementById("sidebarOverlay");
            let menuItems = document.querySelectorAll(".menu-text");
            let menuLinks = document.querySelectorAll("#sidebarMenu a");

            // Toggle sidebar width
            sidebar.classList.toggle("w-64");
            sidebar.classList.toggle("w-16");
            sidebarOverlay.classList.toggle("w-64");
            sidebarOverlay.classList.toggle("w-16");

            // Toggle visibility of menu items and alignment of links
            let isMinimized = sidebar.classList.contains("w-16");
            menuItems.forEach(item => item.classList.toggle("hidden", isMinimized));
            menuLinks.forEach(link => link.classList.toggle("justify-center", isMinimized));
            menuLinks.forEach(link => link.classList.toggle("pb-3", isMinimized));
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

        // Konfirmasi Logout SweetAlert
        function confirmLogout() {
            Swal.fire({
                title: "Yakin ingin logout?",
                text: "Anda harus login kembali untuk mengakses halaman admin!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, logout!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("logout-form").submit();
                }
            });
        }
    </script>
</body>

</html>
