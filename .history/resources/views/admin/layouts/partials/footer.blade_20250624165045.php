<footer class="absolute bottom-0 left-0 right-0 text-center text-gray-600">
    <div class="mt-10 py-10 ">
        <p>&copy; {{ date('Y') }} <a href="/{{ app()->getLocale() }}" class="text-green-700 hover:text-green-500 font-bold">PT. Harta Gemilang Aselindo</a>. {{ __('footer.rights') }}</p>
    </div>
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

    // Ganti gambar utama portfolio saat thumbnail diklik
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail-container');

        // Set default border aktif
        if (thumbnails.length) {
            thumbnails[0].querySelector('img').classList.add('border-green-500');
        }

        thumbnails.forEach(container => {
            const img = container.querySelector('img');
            container.addEventListener('click', () => {
                mainImage.src = img.src; // Ambil langsung dari gambar

                document.querySelectorAll('.thumbnail-img').forEach(thumb => {
                    thumb.classList.remove('border-green-500');
                });

                img.classList.add('border-green-500');
            });
        });
    });

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
