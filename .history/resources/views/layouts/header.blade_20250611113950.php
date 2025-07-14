<header class="bg-gray-900/50 p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('/logo.png') }}" alt="HGA Logo" class="h-20">
                    <span class="text-white font-bold ml-2">PT. HARTA GEMILANG ASELINDO</span>
                </a>
            </div>
            <!-- Mobile Hamburger -->
            <button id="mobile-menu-btn" class="lg:hidden text-white focus:outline-none ml-4 z-50" aria-label="Open menu">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center space-x-6">
                <nav class="flex space-x-6 text-lg">
                    <a href="/{{ app()->getLocale() }}" class="text-white hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2">
                        {{ __('menu.home') }}
                    </a>
                    <a href="/{{ app()->getLocale() }}/about" class="text-white hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2">
                        {{ __('menu.about') }}
                    </a>
                    <a href="/{{ app()->getLocale() }}/services" class="text-white hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2">
                        {{ __('menu.services') }}
                    </a>
                    <a href="/{{ app()->getLocale() }}/portfolio" class="text-white hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2">
                        {{ __('menu.portfolio') }}
                    </a>
                    <a href="/{{ app()->getLocale() }}/contact" class="text-white hover:text-green-300 hover:scale-110 transition-all duration-300 flex items-center gap-2">
                        {{ __('menu.contact') }}
                    </a>
                </nav>
                @php
                $locale = request()->segment(1);
                @endphp
                <div class="flex space-x-2">
                    @if ($locale === 'id')
                    <a href="/en">
                        <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                            <!-- Indonesia Flag SVG -->
                            <svg
                                className="w-full h-full rounded-full"
                                version="1.1"
                                id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlnsXlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                viewBox="0 0 150 150"
                                enableBackground="new 0 0 150 150"
                                xmlSpace="preserve">
                                <rect x="-1" y="-0.999" fill="#ED1C24" width="152" height="75.999" />
                                <rect x="-1" y="75" fill="#FFFFFF" width="152" height="76" />
                                <path
                                    opacity="0.1"
                                    d="M151,160H66c0,0,60.501-26.039,60.501-85C126.501,16.207,66-9.999,66-9.999h85V160z" />
                            </svg>

                        </div>
                    </a>
                    @else
                    <a href="/id">
                        <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                            <!-- UK Flag SVG -->
                            <svg class="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150"
                                enable-background="new 0 0 150 150" xml:space="preserve">
                                <!-- ... SVG content ... -->
                                <!-- (Keep your UK flag SVG here) -->
                            </svg>
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
        <button id="close-mobile-menu" class="absolute top-8 right-8 text-white text-3xl focus:outline-none" aria-label="Close menu">&times;</button>
        <nav class="flex flex-col space-y-8 text-2xl items-center">
            <a href="/{{ app()->getLocale() }}" class="text-white hover:text-green-300 transition-all duration-300" onclick="closeMobileMenu()">
                {{ __('menu.home') }}
            </a>
            <a href="/{{ app()->getLocale() }}/about" class="text-white hover:text-green-300 transition-all duration-300" onclick="closeMobileMenu()">
                {{ __('menu.about') }}
            </a>
            <a href="/{{ app()->getLocale() }}/services" class="text-white hover:text-green-300 transition-all duration-300" onclick="closeMobileMenu()">
                {{ __('menu.services') }}
            </a>
            <a href="/{{ app()->getLocale() }}/portfolio" class="text-white hover:text-green-300 transition-all duration-300" onclick="closeMobileMenu()">
                {{ __('menu.portfolio') }}
            </a>
            <a href="/{{ app()->getLocale() }}/contact" class="text-white hover:text-green-300 transition-all duration-300" onclick="closeMobileMenu()">
                {{ __('menu.contact') }}
            </a>
        </nav>
        <div class="flex space-x-4 mt-12">
            @if ($locale === 'id')
            <a href="/en" onclick="closeMobileMenu()">
                <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                    <!-- Indonesia Flag SVG -->
                    <svg class="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150"
                        enable-background="new 0 0 150 150" xml:space="preserve">
                        <rect x="-1" y="-0.999" fill="#ED1C24" width="152" height="75.999" />
                        <rect x="-1" y="75" fill="#FFFFFF" width="152" height="76" />
                        <path opacity="0.1"
                            d="M151,160H66c0,0,60.501-26.039,60.501-85C126.501,16.207,66-9.999,66-9.999h85V160z" />
                    </svg>
                </div>
            </a>
            @else
            <a href="/id" onclick="closeMobileMenu()">
                <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                    <!-- UK Flag SVG -->
                    <svg class="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150"
                        enable-background="new 0 0 150 150" xml:space="preserve">
                        <!-- ... SVG content ... -->
                        <!-- (Keep your UK flag SVG here) -->
                    </svg>
                </div>
            </a>
            @endif
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
