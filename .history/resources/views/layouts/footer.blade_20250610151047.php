<section class="parallax-container">
    {{-- Background overlay --}}
    <div class="parallax-bg"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-3xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">{{ __('join_us.title') }}</h2>
        <p class="text-lg mb-6">
            {{ __('join_us.subtitle') }}
        </p>
        <a href="{{ url(app()->getLocale() . '/contact') }}" class="btn button-primary">
            {{ __('contact.button') }}
        </a>
    </div>

    <style>
        .parallax-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .parallax-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            background-image: url('images/bg-1.jpg');
            background-size: cover;
            background-position: center;
            transform: translateY(0);
            transition: transform 0.1s ease-out;
        }
    </style>

    <script>
        document.addEventListener('scroll', function() {
            let scrollPos = window.scrollY;
            document.querySelector('.parallax-bg').style.transform = `translateY(${scrollPos * -0.3}px)`;
        });
    </script>

    <!-- {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/bg-1.jpg') }}" alt="bg.jpg"
            class="w-full h-full object-cover opacity-20">
    </div> -->
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
            <div>
                <h3 class="text-2xl font-bold mb-2">{{ __('footer.contact_title') }}</h3>
                <table class="w-full border-collapse">
                    <tr>
                        <td class="pr-2">{{ __('footer.email_subtitle') }}</td>
                        <td class="pr-2">:</td>
                        <td>hartagia@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="pr-2">{{ __('footer.phone_subtitle') }}</td>
                        <td class="pr-2">:</td>
                        <td>021 22802410</td>
                    </tr>
                    <tr>
                        <td class="pr-2 align-top">{{ __('footer.address_subtitle') }}</td>
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
    <div class="text-center py-4 text-gray-500">
        <p>&copy; {{ date('Y') }} PT. Harta Gemilang Aselindo. {{ __('footer.rights') }}</p>
    </div>
</footer>
