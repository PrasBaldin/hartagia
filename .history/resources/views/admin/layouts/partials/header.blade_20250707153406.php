<div class="h-[72px] relative z-30"></div>
<nav class="fixed top-0 z-50 w-full bg-gray-800 text-white flex justify-between items-center px-6 lg:px-8 py-4">
    <div class="flex items-center space-x-4">
        <!-- Toggle Sidebar -->
        <button onclick="toggleSidebar()" class="text-white">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Branding -->
        <a href="{{ url('/') }}" class="text-lg font-semibold">
            {{ $contact->site_name ? $contact->site_name : 'Harta Gemilang' }}
        </a>
    </div>

    <!-- Logout Button -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button type="button" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded flex items-center gap-2" onclick="confirmLogout()">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</nav>
