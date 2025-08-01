<header class="bg-gray-900/50 px-0 py-8 lg:px-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="/{{ app()->getLocale() }}" class="flex items-center">
                    <img src="{{ asset('/logo.png') }}" alt="HGA Logo" class="h-20">
                    <span class="hidden sm:!block text-white font-bold ml-2">PT. HARTA GEMILANG ASELINDO</span>
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
                    if ($locale === 'id') {
                        $newPath = str_replace('id', 'en', $path);
                    } else {
                        $newPath = str_replace('en', 'id', $path);
                    }
                @endphp
                <div class="flex space-x-2">
                    @if ($locale === 'id')
                        <a href="/{{ $newPath }}">
                            <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- Indonesia Flag SVG -->
                                <svg className="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" enableBackground="new 0 0 150 150" xmlSpace="preserve">
                                    <rect x="-1" y="-0.999" fill="#ED1C24" width="152" height="75.999" />
                                    <rect x="-1" y="75" fill="#FFFFFF" width="152" height="76" />
                                    <path opacity="0.1" d="M151,160H66c0,0,60.501-26.039,60.501-85C126.501,16.207,66-9.999,66-9.999h85V160z" />
                                </svg>
                            </div>
                        </a>
                    @else
                        <a href="/{{ $newPath }}">
                            <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- USA Flag SVG -->
                                <svg className="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" enableBackground="new 0 0 150 150" xmlSpace="preserve">
                                    <g>
                                        <rect x="-1" y="-0.881" fill="#FFFFFF" width="151.999" height="152" />
                                        <rect x="-1" y="139.226" fill="#B22436" width="151.999" height="11.655" />
                                        <rect x="-1" y="115.914" fill="#B22436" width="151.999" height="11.655" />
                                        <rect x="-1" y="92.603" fill="#B22436" width="151.999" height="11.655" />
                                        <rect x="75" y="69.291" fill="#B22436" width="75.999" height="11.655" />
                                        <rect x="75" y="45.979" fill="#B22436" width="75.999" height="11.655" />
                                        <rect x="75" y="22.668" fill="#B22436" width="75.999" height="11.655" />
                                        <rect x="75" y="-1.119" fill="#B22436" width="75.999" height="12.131" />
                                        <path fill="#3D3B6F" d="M-1-0.882v13.779l0.42-1.21l1.11,3.19l3.37,0.07l-2.69,2.04l0.98,3.229l-2.77-1.93L-1,18.578v10.54
  l0.42-1.21l1.11,3.189l3.37,0.07l-2.69,2.04l0.98,3.229l-2.77-1.93L-1,34.798v10.54l0.42-1.21l1.11,3.19l3.37,0.069l-2.69,2.04
  l0.98,3.23l-2.77-1.931L-1,51.018v10.84l0.42-1.199l1.11,3.18l3.37,0.07l-2.69,2.04l0.98,3.229l-2.77-1.93L-1,67.538v13.649h77.44
  V-0.882H-1z M12.07,77.488L9.3,75.558l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L12.07,77.488z M11.09,57.838l0.98,3.23L9.3,59.147l-2.77,1.921l0.98-3.23l-2.69-2.04l3.37-0.06l1.11-3.19l1.11,3.19l3.37,0.06
  L11.09,57.838z M11.09,41.428l0.98,3.23L9.3,42.728l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L11.09,41.428z M11.09,25.008l0.98,3.23L9.3,26.308l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07
  L11.09,25.008z M11.09,8.588l0.98,3.24L9.3,9.897l-2.77,1.931l0.98-3.24l-2.69-2.03l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L11.09,8.588z M21.34,69.178l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L21.34,69.178z M20.36,49.428l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L20.36,49.428z M20.36,33.208l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.189l1.11,3.189l3.37,0.07
  L20.36,33.208z M20.36,16.988l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.19l1.11,3.19l3.37,0.07
  L20.36,16.988z M31.22,77.488l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L31.22,77.488z M30.24,57.838l0.98,3.23l-2.77-1.921l-2.77,1.921l0.98-3.23l-2.69-2.04l3.37-0.06l1.11-3.19l1.11,3.19l3.37,0.06
  L30.24,57.838z M30.24,41.428l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L30.24,41.428z M30.24,25.008l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07
  L30.24,25.008z M30.24,8.588l0.98,3.24l-2.77-1.931l-2.77,1.931l0.98-3.24l-2.69-2.03l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L30.24,8.588z M40.49,69.178l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L40.49,69.178z M39.51,49.428l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L39.51,49.428z M39.51,33.208l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.189l1.11,3.189l3.37,0.07
  L39.51,33.208z M39.51,16.988l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.19l1.11,3.19l3.37,0.07
  L39.51,16.988z M50.37,77.488l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.68,2.04
  L50.37,77.488z M49.4,57.838l0.97,3.23l-2.77-1.921l-2.77,1.921l0.98-3.23l-2.69-2.04l3.37-0.06l1.11-3.19l1.11,3.19l3.37,0.06
  L49.4,57.838z M49.4,41.428l0.97,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L49.4,41.428z M49.4,25.008l0.97,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07
  L49.4,25.008z M49.4,8.588l0.97,3.24L47.6,9.897l-2.77,1.931l0.98-3.24l-2.69-2.03l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L49.4,8.588z M59.64,69.178l-2.77-1.93l-2.76,1.93l0.97-3.229l-2.69-2.04l3.38-0.07l1.1-3.18l1.11,3.18l3.38,0.07l-2.69,2.04
  L59.64,69.178z M58.67,49.428l0.97,3.23l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.069l1.1-3.19l1.11,3.19l3.38,0.069
  L58.67,49.428z M58.67,33.208l0.97,3.229l-2.77-1.93l-2.76,1.93l0.97-3.229l-2.69-2.04l3.38-0.07l1.1-3.189l1.11,3.189l3.38,0.07
  L58.67,33.208z M58.67,16.988l0.97,3.229l-2.77-1.93l-2.76,1.93l0.97-3.229l-2.69-2.04l3.38-0.07l1.1-3.19l1.11,3.19l3.38,0.07
  L58.67,16.988z M69.52,77.488l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.07l1.1-3.18l1.11,3.18l3.38,0.07l-2.69,2.04
  L69.52,77.488z M68.55,57.838l0.97,3.23l-2.77-1.921l-2.76,1.921l0.97-3.23l-2.69-2.04l3.38-0.06l1.1-3.19l1.11,3.19l3.38,0.06
  L68.55,57.838z M68.55,41.428l0.97,3.23l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.069l1.1-3.19l1.11,3.19l3.38,0.069
  L68.55,41.428z M68.55,25.008l0.97,3.23l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.07l1.1-3.18l1.11,3.18l3.38,0.07
  L68.55,25.008z M68.55,8.588l0.97,3.24l-2.77-1.931l-2.76,1.931l0.97-3.24l-2.69-2.03l3.38-0.069l1.1-3.19l1.11,3.19l3.38,0.069
  L68.55,8.588z" />
                                    </g>
                                    <path opacity="0.1" d="M150.999,160h-85c0,0,60.501-26.039,60.501-85c0-58.793-60.501-84.999-60.501-84.999h85V160z" />
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
        <button id="close-mobile-menu" class="absolute top-8 right-8 py-4 px-[20px] text-white text-3xl focus:outline-none" aria-label="Close menu">&times;</button>
        <div class="w-full p-20 pt-0">
            <p class="text-gray-600 mb-4">Menu</p>
            <nav class="flex flex-col space-y-8 text-4xl w-full justify-start">
                <a href="/{{ app()->getLocale() }}" class="hover:text-green-300 transition-all duration-300 {{ request()->is(app()->getLocale()) ? 'font-bold text-green-700' : 'text-white' }}" onclick="closeMobileMenu()">
                    {{ __('menu.home') }}
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
                <p class="text-gray-600 mb-4">{{ __('menu.language') }}</p>
                <div class="flex space-x-4 justify-start">
                    @if ($locale === 'id')
                        <a href="/en" onclick="closeMobileMenu()" class="flex items-center space-x-4">
                            <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- Indonesia Flag SVG -->
                                <svg className="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" enableBackground="new 0 0 150 150" xmlSpace="preserve">
                                    <rect x="-1" y="-0.999" fill="#ED1C24" width="152" height="75.999" />
                                    <rect x="-1" y="75" fill="#FFFFFF" width="152" height="76" />
                                    <path opacity="0.1" d="M151,160H66c0,0,60.501-26.039,60.501-85C126.501,16.207,66-9.999,66-9.999h85V160z" />
                                </svg>
                            </div>
                            <span class="text-4xl text-white">Indonesia</span>
                        </a>
                    @else
                        <a href="/id" onclick="closeMobileMenu()" class="flex items-center space-x-4">
                            <div class="w-10 rounded-full overflow-hidden hover:scale-[1.2] transition-transform duration-300">
                                <!-- USA Flag SVG -->
                                <svg className="w-full h-full rounded-full" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" enableBackground="new 0 0 150 150" xmlSpace="preserve">
                                    <g>
                                        <rect x="-1" y="-0.881" fill="#FFFFFF" width="151.999" height="152" />
                                        <rect x="-1" y="139.226" fill="#B22436" width="151.999" height="11.655" />
                                        <rect x="-1" y="115.914" fill="#B22436" width="151.999" height="11.655" />
                                        <rect x="-1" y="92.603" fill="#B22436" width="151.999" height="11.655" />
                                        <rect x="75" y="69.291" fill="#B22436" width="75.999" height="11.655" />
                                        <rect x="75" y="45.979" fill="#B22436" width="75.999" height="11.655" />
                                        <rect x="75" y="22.668" fill="#B22436" width="75.999" height="11.655" />
                                        <rect x="75" y="-1.119" fill="#B22436" width="75.999" height="12.131" />
                                        <path fill="#3D3B6F" d="M-1-0.882v13.779l0.42-1.21l1.11,3.19l3.37,0.07l-2.69,2.04l0.98,3.229l-2.77-1.93L-1,18.578v10.54
  l0.42-1.21l1.11,3.189l3.37,0.07l-2.69,2.04l0.98,3.229l-2.77-1.93L-1,34.798v10.54l0.42-1.21l1.11,3.19l3.37,0.069l-2.69,2.04
  l0.98,3.23l-2.77-1.931L-1,51.018v10.84l0.42-1.199l1.11,3.18l3.37,0.07l-2.69,2.04l0.98,3.229l-2.77-1.93L-1,67.538v13.649h77.44
  V-0.882H-1z M12.07,77.488L9.3,75.558l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L12.07,77.488z M11.09,57.838l0.98,3.23L9.3,59.147l-2.77,1.921l0.98-3.23l-2.69-2.04l3.37-0.06l1.11-3.19l1.11,3.19l3.37,0.06
  L11.09,57.838z M11.09,41.428l0.98,3.23L9.3,42.728l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L11.09,41.428z M11.09,25.008l0.98,3.23L9.3,26.308l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07
  L11.09,25.008z M11.09,8.588l0.98,3.24L9.3,9.897l-2.77,1.931l0.98-3.24l-2.69-2.03l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L11.09,8.588z M21.34,69.178l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L21.34,69.178z M20.36,49.428l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L20.36,49.428z M20.36,33.208l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.189l1.11,3.189l3.37,0.07
  L20.36,33.208z M20.36,16.988l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.19l1.11,3.19l3.37,0.07
  L20.36,16.988z M31.22,77.488l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L31.22,77.488z M30.24,57.838l0.98,3.23l-2.77-1.921l-2.77,1.921l0.98-3.23l-2.69-2.04l3.37-0.06l1.11-3.19l1.11,3.19l3.37,0.06
  L30.24,57.838z M30.24,41.428l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L30.24,41.428z M30.24,25.008l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07
  L30.24,25.008z M30.24,8.588l0.98,3.24l-2.77-1.931l-2.77,1.931l0.98-3.24l-2.69-2.03l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L30.24,8.588z M40.49,69.178l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.69,2.04
  L40.49,69.178z M39.51,49.428l0.98,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L39.51,49.428z M39.51,33.208l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.189l1.11,3.189l3.37,0.07
  L39.51,33.208z M39.51,16.988l0.98,3.229l-2.77-1.93l-2.77,1.93l0.98-3.229l-2.69-2.04l3.37-0.07l1.11-3.19l1.11,3.19l3.37,0.07
  L39.51,16.988z M50.37,77.488l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07l-2.68,2.04
  L50.37,77.488z M49.4,57.838l0.97,3.23l-2.77-1.921l-2.77,1.921l0.98-3.23l-2.69-2.04l3.37-0.06l1.11-3.19l1.11,3.19l3.37,0.06
  L49.4,57.838z M49.4,41.428l0.97,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L49.4,41.428z M49.4,25.008l0.97,3.23l-2.77-1.931l-2.77,1.931l0.98-3.23l-2.69-2.04l3.37-0.07l1.11-3.18l1.11,3.18l3.37,0.07
  L49.4,25.008z M49.4,8.588l0.97,3.24L47.6,9.897l-2.77,1.931l0.98-3.24l-2.69-2.03l3.37-0.069l1.11-3.19l1.11,3.19l3.37,0.069
  L49.4,8.588z M59.64,69.178l-2.77-1.93l-2.76,1.93l0.97-3.229l-2.69-2.04l3.38-0.07l1.1-3.18l1.11,3.18l3.38,0.07l-2.69,2.04
  L59.64,69.178z M58.67,49.428l0.97,3.23l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.069l1.1-3.19l1.11,3.19l3.38,0.069
  L58.67,49.428z M58.67,33.208l0.97,3.229l-2.77-1.93l-2.76,1.93l0.97-3.229l-2.69-2.04l3.38-0.07l1.1-3.189l1.11,3.189l3.38,0.07
  L58.67,33.208z M58.67,16.988l0.97,3.229l-2.77-1.93l-2.76,1.93l0.97-3.229l-2.69-2.04l3.38-0.07l1.1-3.19l1.11,3.19l3.38,0.07
  L58.67,16.988z M69.52,77.488l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.07l1.1-3.18l1.11,3.18l3.38,0.07l-2.69,2.04
  L69.52,77.488z M68.55,57.838l0.97,3.23l-2.77-1.921l-2.76,1.921l0.97-3.23l-2.69-2.04l3.38-0.06l1.1-3.19l1.11,3.19l3.38,0.06
  L68.55,57.838z M68.55,41.428l0.97,3.23l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.069l1.1-3.19l1.11,3.19l3.38,0.069
  L68.55,41.428z M68.55,25.008l0.97,3.23l-2.77-1.931l-2.76,1.931l0.97-3.23l-2.69-2.04l3.38-0.07l1.1-3.18l1.11,3.18l3.38,0.07
  L68.55,25.008z M68.55,8.588l0.97,3.24l-2.77-1.931l-2.76,1.931l0.97-3.24l-2.69-2.03l3.38-0.069l1.1-3.19l1.11,3.19l3.38,0.069
  L68.55,8.588z" />
                                    </g>
                                    <path opacity="0.1" d="M150.999,160h-85c0,0,60.501-26.039,60.501-85c0-58.793-60.501-84.999-60.501-84.999h85V160z" />
                                </svg>
                            </div>
                            <span class="text-4xl text-white">English</span>
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
