@extends('admin.layouts.app')

@section('content')
<div class="p-8 mt-6 bg-white rounded-lg shadow-md">
    <span>You are logged in!</span>
    <div class="mt-4">
        <a href="{{ route('portfolio.index') }}">Kelola Portofolio</a>
    </div>
</div>

@endsection
