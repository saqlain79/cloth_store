@extends('home.app')
@section('content')

<main>
    <div class="login-container justify-content-center align-items-center">
        <div class="card card-surface shadow-lg border-0 p-4 col-md-6 col-lg-4 m-auto">
            <h2 class="fw-bold mb-4 text-center">Account Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-accent w-100">Login</button>
            </form>
            <p class="text-center mt-3 mb-0">Don't have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-accent w-100 mt-3">Register here</a>
        </div>
    </div>
</main>

@endsection