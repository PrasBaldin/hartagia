@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <h1 class="py-10 lg:py-20 md:w-3/4 text-4xl lg:text-6xl pr-20 font-bold leading-tight">{{ __('service.headline') }}</h1>
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-8">
                    @foreach ($services as $service)
                        <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                            <div class="flex-shrink-0 w-full md:w-1/2 rounded-lg shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->service_name->translated_text }}" class="w-full h-[200px] md:h-[250px] object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-1 p-6">
                                <h5 class="text-2xl font-semibold uppercase tracking-widest text-green-700 flex items-center gap-2">
                                    {{ $service->service_name->translated_text }}
                                </h5>
                                <p class="mt-2">
                                    {{ $service->service_desc->translated_text }}
                                </p>
                                @if ($service->getServicePoint(1))
                                    @for ($i = 1; $i <= 3; $i++)
                                        @php $point = $service->getServicePoint($i); @endphp
                                    @endfor
                                    <ul class="list-disc pl-5 mt-4 space-y-2">
                                        <li>{{ $service->getServicePoint(1) ? $service->getServicePoint(1)->translated_text : '' }}</li>
                                        <li>{{ $service->getServicePoint(2) ? $service->getServicePoint(2)->translated_text : '' }}</li>
                                        <li>{{ $service->getServicePoint(3) ? $service->getServicePoint(3)->translated_text : '' }}</li>
                                    </ul>
                                @endif
                                <a href="{{ route('service.show', ['lang' => app()->getLocale(), 'slug' => $service->slug]) }}" class="btn button-secondary mt-6 items-center gap-2 hover:scale-105 transition-transform duration-200">
                                    <span>{{ __('service.learn_more') }}</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
