@extends('layouts.app')
@section('content')
<section class="bg-gray-900/50 text-white items-center md:pb-0 min-h-[180px]">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[270px] sm:max-h-[282.5px] lg:max-h-[325px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[270px] sm:max-h-[282.5px] lg:max-h-[325px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0 ">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <div class="flex items-center text-4xl text-gray-300 space-x-2 md:pt-10 pb-10" aria-label="Breadcrumb">
                        <a href="{{ url(app()->getLocale() . '/') }}" class="hover:underline hover:text-white">
                            {{ __('menu.home') }}
                        </a>
                        <span>/</span>
                        <span class="text-white font-semibold">
                            {{ __('menu.contact') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="flex items-center justify-between flex-col md:flex-row gap-10 py-20">
            <div class="mb-6 md:mb-0 max-w-full w-[400px]">
                <form action="#" method="POST" class="bg-white rounded-lg shadow-md p-6 space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-1">{{ __('contact.form.name') }}</label>
                        <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-700" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-1">{{ __('contact.form.email') }}</label>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-700" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 font-semibold mb-1">{{ __('contact.form.message') }}</label>
                        <textarea id="message" name="message" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-700" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-green-700 text-white font-semibold py-2 rounded hover:bg-green-800 transition">{{ __('contact.form.send') }}</button>
                </form>
            </div>
            <div class="md:w-1/2">
                <h2 class="uppercase tracking-widest text-green-700 mb-6">{{ __('contact.title') }}</h2>
                <h2 class="text-6xl font-semibold mb-6">{{ __('contact.subtitle') }}</h2>
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
</section>

@endsection
