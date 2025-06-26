@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h4>Foodpanda Dashboard</h4>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Hello, {{ auth()->user()->name }}</h5>
                    <p class="card-text">Email: {{ auth()->user()->email }}</p>

                    <div class="mt-4 d-flex gap-2">
                        {{-- Logout --}}
                        <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>

                        {{-- Optional: Back to ecommerce-app --}}
                        <a href="http://127.0.0.1:8000/home" class="btn btn-outline-secondary">Back to Ecommerce</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
