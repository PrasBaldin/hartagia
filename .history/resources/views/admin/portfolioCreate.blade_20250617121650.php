@extends('admin.layouts.app')

@section('content')
<section>
    <h1>Ini Halaman Portfolio Create</h1>
    <div class="py-10">
        @if(session('warning'))
        <div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-xl shadow">
            {{ session('warning') }}
        </div>
        @endif
    </div>
    <a href="{{ route('portfolio') }}">kelola portfolio</a>
</section>
@endsection
