@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Dashboard</h4>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Welcome, {{ auth()->user()->name }}</h5>
                    <p class="card-text">Email: {{ auth()->user()->email }}</p>

                    <div class="mt-4 d-flex gap-2">
                        {{-- Logout --}}
                        <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>

                        {{-- Redirect to Foodpanda App --}}
                        @php
                            $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser(auth()->user());
                            $foodpandaUrl = config('services.foodpanda_app_url') . '/consume-token?token=' . $token;
                        @endphp

                        <a href="{{ $foodpandaUrl }}" target="_blank" class="btn btn-success">Go to Foodpanda App</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
