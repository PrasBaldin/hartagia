@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Our Services</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Web Development</h5>
                    <p class="card-text">Custom web applications and websites tailored to your business needs using the latest technologies.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Mobile App Development</h5>
                    <p class="card-text">Native and cross-platform mobile solutions for Android and iOS to engage your customers on the go.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">UI/UX Design</h5>
                    <p class="card-text">Intuitive and engaging user interfaces designed to provide the best user experience for your audience.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
