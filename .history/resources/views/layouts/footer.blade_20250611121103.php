<section class="parallax-container bg-gradient-to-br from-gray-900/100 to-black/30 relative overflow-hidden">
    {{-- Animated Background Overlay --}}
    <div class="parallax-bg z-[-1] absolute inset-0 transition-transform duration-500"></div>
    {{-- Decorative SVG Waves --}}
    <svg class="absolute bottom-0 left-0 w-full h-24 z-0" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="#111827" fill-opacity="0.4" d="M0,224L48,218.7C96,213,192,203,288,197.3C384,192,480,192,576,197.3C672,203,768,213,864,197.3C960,181,1056,139,1152,128C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    {{-- Content --}}
    <div class="relative z-10 max-w-3xl mx-auto text-center py-16">
        <h2 class="text-6xl md:text-5xl font-extrabold mb-4 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-gradient-x">
            {{ __('join_us.title') }}
        </h2>
        <p class="mb-6 text-lg text-gray-200 animate-fade-in">
            {{ __('join_us.subtitle') }}
        </p>
        <a href="{{ url(app()->getLocale() . '/contact') }}" class="btn button-primary shadow-lg hover:scale-105 transition-transform duration-200">
            {{ __('contact.button') }}
        </a>
    </div>
</section>

<footer class="bg-white text-gray-800 py-20 md:pt-[10rem] border-t relative">
    <div class="container mx-auto">
        <div class="px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Tentang Kami --}}
            <div>
                <h3 class="text-2xl font-bold mb-2 flex items-center gap-2">
                    <i class="fas fa-info-circle text-green-600"></i>
                    {{ __('footer.about_title') }}
                </h3>
                <p class="mb-4 text-gray-600">
                    {{ __('footer.about_desc') }}
                </p>
            </div>
            {{-- Tautan Cepat --}}
            <div>
                <h3 class="text-2xl font-bold mb-2 flex items-center gap-2">
                    <i class="fas fa-link text-blue-600"></i>
                    {{ __('footer.quick_links') }}
                </h3>
                <ul class="space-y-1">
                    <li><a href="/{{ app()->getLocale() }}" class="text-green-700 hover:underline hover:text-green-900 transition">{{ __('menu.home') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/about" class="hover:underline hover:text-blue-700 transition">{{ __('menu.about') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/services" class="hover:underline hover:text-purple-700 transition">{{ __('menu.services') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/portfolio" class="hover:underline hover:text-pink-700 transition">{{ __('menu.portfolio') }}</a></li>
                    <li><a href="/{{ app()->getLocale() }}/contact" class="hover:underline hover:text-yellow-700 transition">{{ __('menu.contact') }}</a></li>
                </ul>
            </div>
            {{-- Info Kontak --}}
            <div>
                <h3 class="text-2xl font-bold mb-2 flex items-center gap-2">
                    <i class="fas fa-address-book text-purple-600"></i>
                    {{ __('footer.contact_title') }}
                </h3>
                <table class="w-full border-collapse text-gray-700">
                    <tr>
                        <td class="pr-2"><i class="fas fa-envelope"></i></td>
                        <td class="pr-2">:</td>
                        <td><a href="mailto:hartagia@gmail.com" class="hover:underline">hartagia@gmail.com</a></td>
                    </tr>
                    <tr>
                        <td class="pr-2"><i class="fas fa-phone-alt"></i></td>
                        <td class="pr-2">:</td>
                        <td><a href="tel:02122802410" class="hover:underline">021 22802410</a></td>
                    </tr>
                    <tr>
                        <td class="pr-2 align-top"><i class="fas fa-map-marker-alt"></i></td>
                        <td class="pr-2 align-top">:</td>
                        <td>
                            {{ __('footer.address') }}
                        </td>
                    </tr>
                </table>
                <div class="flex gap-4 mt-4">
                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-twitter fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    {{-- Decorative Top Divider --}}
    <svg class="absolute top-0 left-0 w-full h-8 -mt-8" viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="#f3f4f6" d="M0,64L48,58.7C96,53,192,43,288,37.3C384,32,480,32,576,37.3C672,43,768,53,864,37.3C960,21,1056,-21,1152,-32C1248,-43,1344,-21,1392,-10.7L1440,0L1440,80L1392,80C1344,80,1248,80,1152,80C1056,80,960,80,864,80C768,80,672,80,576,80C480,80,384,80,288,80C192,80,96,80,48,80L0,80Z"></path>
    </svg>
    {{-- Copyright --}}
    <div class="text-center py-4 mt-10 text-gray-500">
        <p>&copy; {{ date('Y') }} PT. Harta Gemilang Aselindo. {{ __('footer.rights') }}</p>
    </div>
</footer>

<style>
    @keyframes gradient-x {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 5s ease-in-out infinite;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1.2s cubic-bezier(.4, 0, .2, 1) both;
    }
</style>

<script>
    document.addEventListener('scroll', function() {
        let scrollPos = window.scrollY;
        let scaleValue = 1.5 - (scrollPos * 0.00009);
        document.querySelector('.parallax-bg').style.transform = `translateY(${scrollPos * -0.15}px) scale(${scaleValue})`;
    });
</script>
