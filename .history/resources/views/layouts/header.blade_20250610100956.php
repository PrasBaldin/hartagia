<header class="bg-gray-900 p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="HGA Logo" class="h-10">
                    <span class="text-white font-bold ml-2">PT. HARTA GEMILANG ASELINDO</span>
                </div>
            </div>
            <div class="flex items-center space-x-6">
                <nav class="space-x-4">
                    <a href="/{{ app()->getLocale() }}" class="text-white hover:underline">{{ __('menu.home') }}</a>
                    <a href="/{{ app()->getLocale() }}/about" class="text-white hover:underline">{{ __('menu.about') }}</a>
                    <a href="/{{ app()->getLocale() }}/services" class="text-white hover:underline">{{ __('menu.services') }}</a>
                    <a href="/{{ app()->getLocale() }}/gallery" class="text-white hover:underline">{{ __('menu.gallery') }}</a>
                    <a href="/{{ app()->getLocale() }}/contact" class="text-white hover:underline">{{ __('menu.contact') }}</a>
                </nav>
                @php
                $locale = request()->segment(1); // Mengambil prefix dari URL
                @endphp

                <div class="flex space-x-2">
                    @if ($locale === 'id')
                    <a href="/en"><img src="/icons/id.svg" class="w-10 rounded-full">
                        <svg
                            className="w-5 h-5 rounded-full"
                            version="1.1"
                            id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlnsXlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            width="150px"
                            height="150px"
                            viewBox="0 0 150 150"
                            enableBackground="new 0 0 150 150"
                            xmlSpace="preserve">
                            <rect x="-1" y="-0.999" fill="#ED1C24" width="152" height="75.999" />
                            <rect x="-1" y="75" fill="#FFFFFF" width="152" height="76" />
                            <path
                                opacity="0.1"
                                d="M151,160H66c0,0,60.501-26.039,60.501-85C126.501,16.207,66-9.999,66-9.999h85V160z" />
                        </svg>
                    </a>
                    @else
                    <a href="/id"><img src="/icons/en.svg" class="w-10 rounded-full"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
