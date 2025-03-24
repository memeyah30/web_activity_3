@extends('base')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 350px;">
        <h4 class="text-center"><strong>Login</strong></h4>
        <hr>

        @if(Session::has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection
