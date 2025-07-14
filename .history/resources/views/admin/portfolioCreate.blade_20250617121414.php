@extends('admin.layouts.app')

@section('content')
@if(session('warning'))
<div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-xl shadow">
    {{ session('warning') }}
</div>
@endif
@endsection
