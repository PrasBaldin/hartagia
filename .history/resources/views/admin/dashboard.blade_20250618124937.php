@extends('admin.layouts.app')

@section('content')
<div class="p-8 mt-6 bg-white rounded-lg shadow-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        You are logged in!
                    </div>
                    <a href="{{ route('admin.portfolio') }}">Kelola Portofolio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
