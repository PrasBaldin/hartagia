<section class="relative bg-green-800 text-white py-20 px-6 text-center">
    {{-- Background overlay --}}
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-3xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">{{ __('join_us.title') }}</h2>
        <p class="text-lg mb-6">
            {{ __('join_us.subtitle') }}
        </p>
        <a href="{{ url(app()->getLocale() . '/contact') }}" class="inline-block mt-2 bg-green-700 hover:bg-green-800 text-white hover:text-gray-200 hover:no-underline py-4 px-6 rounded-full transition">
            {{ __('contact.button') }}
        </a>
    </div>

    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/warehouse.jpg') }}" alt="Warehouse"
            class="w-full h-full object-cover opacity-40">
    </div>
</section>

<footer class="bg-white text-gray-800 py-10 border-t">
    <div class="container mx-auto">
        <div class="px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Tentang Kami --}}
            <div>
                <h3 class="text-2xl font-bold mb-2">{{ __('footer.about_title') }}</h3>
                <p class="mb-4">
                    {{ __('footer.about_desc') }}
                </p>
            </div>

            {{-- Tautan Cepat --}}
            <div>
                <h3 class="text-2xl font-bold mb-2">{{ __('footer.quick_links') }}</h3>
                <ul class="space-y-1">
                    <li><a href="/{{ app()->getLocale() }}" class="text-green-700 hover:underline">{{ __('menu.home') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/about" class="hover:underline">{{ __('menu.about') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/services" class="hover:underline">{{ __('menu.services') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/gallery" class="hover:underline">{{ __('menu.gallery') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/contact" class="hover:underline">{{ __('menu.contact') }}</a></li>
                </ul>
            </div>

            {{-- Info Kontak --}}
            <h3 class="text-2xl font-bold mb-2">{{ __('footer.contact_title') }}</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="font-bold">{{ __('footer.email_subtitle') }}:</span>
                    <span>hartagia@gmail.com</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">{{ __('footer.phone_subtitle') }}:</span>
                    <span>021 22802410</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">{{ __('footer.address_subtitle') }}:</span>
                    <span class="text-right">
                        {{ __('footer.address') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="text-center py-4 text-gray-500">
        <p>&copy; {{ date('Y') }} PT. Harta Gemilang Aselindo. {{ __('footer.rights') }}</p>
    </div>
</footer>
