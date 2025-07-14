<div id="sidebarOverlay" class="w-60 transition-all duration-300"></div>
<aside id="sidebar" class="w-60 h-screen fixed left-0 top-0 z-20 bg-gray-900 text-white transition-all duration-300 p-4">
    <ul id="sidebarMenu" class="mt-[72px]">
        <li class="mb-2">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('service.index') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                <i class="fas fa-briefcase"></i>
                <span class="menu-text">Layanan</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('portfolio.index') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                <i class="fas fa-image"></i>
                <span class="menu-text">Portfolio</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('setting.index') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-gray-700">
                <i class="fas fa-cog"></i>
                <span class="menu-text">Pengaturan</span>
            </a>
        </li>
    </ul>
</aside>
