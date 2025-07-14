<section class="parallax-container bg-gradient-to-br from-gray-900/100 to-black/30">
    {{-- Background overlay --}}
    <div class="parallax-bg z-[-1]"></div>

    {{-- Content --}}
    <div class="container">

        <div class="relative z-10 max-w-3xl mx-auto">
            <h2 class="text-6xl md:text-5xl font-bold mb-4">{{ __('join_us.title') }}</h2>
            <p class="mb-6">
                {{ __('join_us.subtitle') }}
            </p>
            <a href="{{ url(app()->getLocale() . '/contact') }}" class="btn button-primary">
                {{ __('contact.button') }}
            </a>
        </div>
    </div>
</section>

<footer class="bg-white text-gray-800 py-20 md:pt-[10rem] border-t">
    <div class="container mx-auto">
        <div class="px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Tentang Kami --}}
            <div>
                <h3 class="text-2xl font-bold mb-6">{{ __('footer.about_title') }}</h3>
                <p class="mb-4">
                    {{ __('footer.about_desc') }}
                </p>
                <div class="flex gap-4 mt-4">
                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-black hover:text-gray-800"><i class="fab fa-tiktok fa-lg"></i></a>
                </div>
            </div>
            {{-- Tautan Cepat --}}
            <div>
                <h3 class="text-2xl font-bold mb-6">{{ __('footer.quick_links') }}</h3>
                <ul class="space-y-1">
                    <li><a href="/{{ app()->getLocale() }}" class="hover:text-green-500 transition-all duration-300 {{ request()->is(app()->getLocale()) ? 'font-bold text-green-700' : 'text-gray-700' }}">{{ __('menu.home') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/about" class="hover:text-green-500 transition-all duration-300 {{ request()->is(app()->getLocale().'/about') ? 'font-bold text-green-700' : 'text-gray-700' }}">{{ __('menu.about') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/services" class="hover:text-green-500 transition-all duration-300 {{ request()->is(app()->getLocale().'/services') ? 'font-bold text-green-700' : 'text-gray-700' }}">{{ __('menu.services') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/portfolio" class="hover:text-green-500 transition-all duration-300 {{ request()->is(app()->getLocale().'/portfolio') ? 'font-bold text-green-700' : 'text-gray-700' }}">{{ __('menu.portfolio') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/contact" class="hover:text-green-500 transition-all duration-300 {{ request()->is(app()->getLocale().'/contact') ? 'font-bold text-green-700' : 'text-gray-700' }}">{{ __('menu.contact') }}</a></li>
                </ul>
            </div>

            {{-- Info Kontak --}}
            <div>
                <h3 class="text-2xl font-bold mb-6">{{ __('footer.contact_title') }}</h3>
                <table class="w-full border-collapse">
                    <tr>
                        <td class="pr-2"><i class="fas fa-envelope text-gray-700"></i></td>
                        <td class="pr-2">:</td>
                        <td>hartagia@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="pr-2"><i class="fas fa-phone-alt text-gray-700"></i></td>
                        <td class="pr-2">:</td>
                        <td>021 22802410</td>
                    </tr>
                    <tr>
                        <td class="pr-2 align-top"><i class="fas fa-map-marker-alt text-gray-700"></i></td>
                        <td class="pr-2 align-top">:</td>
                        <td>
                            {{ __('footer.address') }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="text-center py-4 mt-10 text-gray-500">
        <p>&copy; {{ date('Y') }} <a href="/{{ app()->getLocale() }}" class="text-green-700 hover:text-green-500 font-bold">PT. Harta Gemilang Aselindo</a>. {{ __('footer.rights') }}</p>
    </div>
</footer>

<script>
    document.addEventListener('scroll', function() {
        let scrollPos = window.scrollY;
        let scaleValue = 1.5 - (scrollPos * 0.00009); // Semakin scroll ke bawah, semakin mengecil

        // Cek ukuran layar untuk menonaktifkan efek di mobile
        if (window.innerWidth > 768) { // 768px sebagai batasan untuk mobile
            document.querySelector('.parallax-bg').style.transform = `translateY(${scrollPos * -0.15}px) scale(${scaleValue})`;
        } else {
            document.querySelector('.parallax-bg').style.transform = 'none';
        }
    });
</script>
