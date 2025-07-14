@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <a href="{{ route('service.index') }}" class="text-gray-500">Layanan</a>
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">Show</span>
</li>
@endsection

@section('content')
<div>
    <p>test</p>
</div>
@endsection
