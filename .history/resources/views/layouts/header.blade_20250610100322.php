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
                <div class="flex space-x-2">
                    <a href="/id"><img src="/icons/id.svg" class="w-5"></a>
                    <a href="/en"><img src="/icons/en.svg" class="w-5"></a>
                </div>
            </div>
        </div>
    </div>
</header>
