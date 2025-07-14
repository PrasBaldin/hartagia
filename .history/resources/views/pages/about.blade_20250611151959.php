@extends('layouts.app')
@section('content')
<section class="bg-gray-900/50 text-white items-center">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[544px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[544px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0 ">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <h1 class="lg:text-8xl md:text-6xl text-4xl font-bold leading-tight">
                        {{ __('about.headline') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-8">
    <h2 class="text-2xl font-semibold mb-4">Tentang Kami</h2>
    <p>Informasi mengenai sejarah, visi, dan misi perusahaan.</p>
</section>
@endsection
