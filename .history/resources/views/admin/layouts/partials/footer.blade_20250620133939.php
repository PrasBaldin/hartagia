<footer class="mt-8 text-center text-gray-600">
    <p>&copy; {{ date('Y') }} <a href="/{{ app()->getLocale() }}" class="text-green-700 hover:text-green-500 font-bold">PT. Harta Gemilang Aselindo</a>. {{ __('footer.rights') }}</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Toggle Sidebar
    function toggleSidebar() {
        let sidebar = document.getElementById("sidebar");
        let sidebarOverlay = document.getElementById("sidebarOverlay");
        let menuItems = document.querySelectorAll(".menu-text");
        let menuLinks = document.querySelectorAll("#sidebarMenu a");

        // Toggle sidebar width
        sidebar.classList.toggle("w-60");
        sidebar.classList.toggle("w-16");
        sidebarOverlay.classList.toggle("w-60");
        sidebarOverlay.classList.toggle("w-16");

        // Toggle visibility of menu items and alignment of links
        let isMinimized = sidebar.classList.contains("w-16");
        menuItems.forEach(item => item.classList.toggle("hidden", isMinimized));
        menuLinks.forEach(link => link.classList.toggle("justify-center", isMinimized));
        menuLinks.forEach(link => link.classList.toggle("pt-4", isMinimized));
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
