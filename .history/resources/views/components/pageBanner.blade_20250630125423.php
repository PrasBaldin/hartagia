<section class="bg-gray-900/50 text-white items-center md:pb-0 min-h-[180px]">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[308px] lg:max-h-[324px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[308px] lg:max-h-[324px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0">
            <div class="flex items-center h-full">
                <div class="flex items-center text-lg md:text-2xl text-gray-300 space-x-2 py-10" aria-label="Breadcrumb">
                    <a href="{{ url(app()->getLocale() . '/') }}" class="hover:underline hover:text-white">
                        {{ __('menu.home') }}
                    </a>
                    <span>/</span>
                    <span class="text-white font-semibold">
                        {{ isset($current) ? $current : __('menu.about') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
