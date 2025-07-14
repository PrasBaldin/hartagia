<section class="bg-gray-900/50 text-white items-center md:pb-0 min-h-[180px]">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[308px] lg:max-h-[324px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[308px] lg:max-h-[324px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="lg:w-1/2 mb-6 md:mb-0">
            <div class="flex items-center h-full">
                <div class="flex items-center text-lg md:text-2xl text-gray-300 space-x-2 py-010" aria-label="Breadcrumb">
                    @php
                        $locale = app()->getLocale();
                        $second = request()->segment(2);
                        $third = request()->segment(3);
                        $label = Lang::has('menu.' . $second) ? trans('menu.' . $second) : ucfirst($second);
                    @endphp

                    <div class="flex items-center text-lg md:text-2xl text-gray-300 space-x-2" aria-label="Breadcrumb">
                        <a href="{{ url($locale . '/') }}" class="hover:text-white" @aos('fade-left', 200)>
                            {{ trans('menu.home') }}
                        </a>
                        <span @aos('fade-left', 300)>/</span>

                        @if ($second && $second !== $locale)
                            @if ($third)
                                <a href="{{ url($locale . '/' . $second) }}" class="hover:text-white" @aos('fade-left', 400)>
                                    {{ $label }}
                                </a>
                                <span @aos('fade-left', 500)>/</span>
                                <span class="text-white font-semibold" @aos('fade-left', 600)">
                                    {{ isset($current) ? $current : ucfirst(str_replace('-', ' ', $third)) }}
                                </span>
                            @else
                                <span class="text-white font-semibold" @aos('fade-left', 400)>
                                    {{ isset($current) ? $current : $label }}
                                </span>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
