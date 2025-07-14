<header class="bg-gray-900/50 px-0 py-8 lg:px-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="/{{ app()->getLocale() }}" class="flex items-center">
                    <img src="{{ asset($contact->logo) }}" alt="Logo.png" class="h-16 lg:h-20">
                    <span class="hidden sm:!block text-white font-bold ml-2 text-2xl">
                        {{ $contact->site_name ? $contact->site_name : 'Harta Gemilang' }}
                    </span>
                </a>
            </div>
            <!-- Mobile Hamburger -->
            <button id="mobile-menu-btn" class="lg:hidden text-white focus:outline-none ml-4 z-50" aria-label="Open menu">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <!-- Desktop Nav -->
            <div class="hidden lg:!flex items-center space-x-6">
                <nav class="flex space-x-6">
                    @php
                        $getLocale = app()->getLocale(); // Ambil locale saat ini
                    @endphp
                    <a href="/{{ app()->getLocale() }}" class="hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2 {{ request()->is($getLocale) ? 'font-bold text-green-500' : 'text-white' }}">
                        {{ __('menu.home') }}
                    </a>
                    <a href="https://katalog.inaproc.id/harta-gemilang-aselindo" target="_blank" class="hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2 text-white">
                        {{ __('menu.eCatalog') }}
                    </a>
                    <a href="/{{ $getLocale }}/about" class="hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2 {{ request()->is($getLocale . '/about') ? 'font-bold text-green-500' : 'text-white' }}">
                        {{ __('menu.about') }}
                    </a>
                    <a href="/{{ $getLocale }}/services" class="hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2 {{ request()->is($getLocale . '/services') || request()->is($getLocale . '/services/*') ? 'font-bold text-green-500' : 'text-white' }}">
                        {{ __('menu.services') }}
                    </a>
                    <a href="/{{ $getLocale }}/portfolio" class="hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2 {{ request()->is($getLocale . '/portfolio') || request()->is($getLocale . '/portfolio/*') ? 'font-bold text-green-500' : 'text-white' }}">
                        {{ __('menu.portfolio') }}
                    </a>
                    <a href="/{{ $getLocale }}/contact" class="hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2 {{ request()->is($getLocale . '/contact') ? 'font-bold text-green-500' : 'text-white' }}">
                        {{ __('menu.contact') }}
                    </a>
                </nav>
                @php
                    $segments = request()->segments(); // Ambil semua segmen URL sebagai array
                    $locale = $segments[0]; // id atau en

                    // Ganti prefix bahasa dengan 'en' atau 'id'
                    $segments[0] = $locale === 'id' ? 'en' : 'id';
                    $newPath = implode('/', $segments);
                @endphp
                <div class="flex space-x-2">
                    @if ($locale === 'id')
                        <a href="/{{ $newPath }}">
                            <div class="w-8 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- Indonesia Flag SVG -->
                                @include('components.icons.indonesiaFlag')
                            </div>
                        </a>
                    @else
                        <a href="/{{ $newPath }}">
                            <div class="w-8 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- USA Flag SVG -->
                                @include('components.icons.usaFlag')
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Sidebar Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-80 z-40 hidden transition-opacity duration-300"></div>
    <!-- Mobile Sidebar -->
    <aside id="mobile-sidebar" class="fixed inset-0 bg-gray-900 flex flex-col items-center justify-center z-50 transform translate-x-full transition-transform duration-300 lg:hidden">
        <button id="close-mobile-menu" class="absolute top-8 right-8 py-4 px-[20px] text-white text-2xl focus:outline-none" aria-label="Close menu">&times;</button>
        <div class="w-full p-20 pt-0">
            <p class="text-gray-400 mb-4">Menu</p>
            <nav class="flex flex-col space-y-8 text-2xl w-full justify-start">
                <a href="/{{ app()->getLocale() }}" class="hover:text-green-300 transition-all duration-300 {{ request()->is(app()->getLocale()) ? 'font-bold text-green-700' : 'text-white' }}" onclick="closeMobileMenu()">
                    {{ __('menu.home') }}
                </a>
                <a href="https://katalog.inaproc.id/harta-gemilang-aselindo" target="_blank" class="hover:text-green-300 transition-all duration-300 text-white">
                    {{ __('menu.eCatalog') }}
                </a>
                <a href="/{{ app()->getLocale() }}/about" class="hover:text-green-300 transition-all duration-300 {{ request()->is(app()->getLocale() . '/about') ? 'font-bold text-green-700' : 'text-white' }}" onclick="closeMobileMenu()">
                    {{ __('menu.about') }}
                </a>
                <a href="/{{ app()->getLocale() }}/services" class="hover:text-green-300 transition-all duration-300 {{ request()->is(app()->getLocale() . '/services') ? 'font-bold text-green-700' : 'text-white' }}" onclick="closeMobileMenu()">
                    {{ __('menu.services') }}
                </a>
                <a href="/{{ app()->getLocale() }}/portfolio" class="hover:text-green-300 transition-all duration-300 {{ request()->is(app()->getLocale() . '/portfolio') ? 'font-bold text-green-700' : 'text-white' }}" onclick="closeMobileMenu()">
                    {{ __('menu.portfolio') }}
                </a>
                <a href="/{{ app()->getLocale() }}/contact" class="hover:text-green-300 transition-all duration-300 {{ request()->is(app()->getLocale() . '/contact') ? 'font-bold text-green-700' : 'text-white' }}" onclick="closeMobileMenu()">
                    {{ __('menu.contact') }}
                </a>
            </nav>
            <div class="mt-12 w-full">
                <p class="text-gray-400 mb-4">{{ __('menu.language') }}</p>
                <div class="flex space-x-4 justify-start">
                    @php
                        $segments = request()->segments(); // Ambil semua segmen URL sebagai array
                        $locale = $segments[0]; // id atau en

                        // Ganti prefix bahasa dengan 'en' atau 'id'
                        $segments[0] = $locale === 'id' ? 'en' : 'id';
                        $newPath = implode('/', $segments);
                    @endphp
                    @if ($locale === 'id')
                        <a href="/en" onclick="closeMobileMenu()" class="flex items-center space-x-4">
                            <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- Indonesia Flag SVG -->
                                @include('components.icons.indonesiaFlag')
                            </div>
                            <span class="text-2xl text-white">Indonesia</span>
                        </a>
                    @else
                        <a href="/id" onclick="closeMobileMenu()" class="flex items-center space-x-4">
                            <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- USA Flag SVG -->
                                @include('components.icons.usaFlag')
                            </div>
                            <span class="text-2xl text-white">English</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </aside>
    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const mobileOverlay = document.getElementById('mobile-menu-overlay');
        const closeBtn = document.getElementById('close-mobile-menu');

        function openMobileMenu() {
            mobileSidebar.classList.remove('translate-x-full');
            mobileSidebar.classList.add('translate-x-0');
            mobileOverlay.classList.remove('hidden');
        }

        function closeMobileMenu() {
            mobileSidebar.classList.remove('translate-x-0');
            mobileSidebar.classList.add('translate-x-full');
            mobileOverlay.classList.add('hidden');
        }

        mobileMenuBtn.addEventListener('click', openMobileMenu);
        closeBtn.addEventListener('click', closeMobileMenu);
        mobileOverlay.addEventListener('click', closeMobileMenu);
    </script>
</header>
