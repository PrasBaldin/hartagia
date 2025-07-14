@extends('admin.layouts.app')

@section('content')
<div class="p-8 mt-6 bg-white rounded-lg shadow-md">
    You are logged in!
</div>
<a href="{{ route('admin.portfolio') }}">Kelola Portofolio</a>

</div>
@endsection
