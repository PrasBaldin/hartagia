@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <a href="{{ route('service.index') }}" class="text-gray-500 hover:text-gray-700 transition">Layanan</a>
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">{{ $service->service_name ? $service->service_name->translated_text : '-' }}</span>
</li>
@endsection

@section('content')
<div class="p-8 bg-white rounded-lg shadow-md">
    <p>test</p>
</div>
@endsection
