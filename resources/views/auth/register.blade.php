@extends('home.app')
@section('content')

<main>
    <div class="login-container justify-content-center align-items-center">
        <div class="card card-surface shadow-lg border-0 p-4 col-md-6 col-lg-4 m-auto">
            <h2 class="fw-bold mb-4 text-center">Account Registration</h2>
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-accent w-100">Register</button>
            </form>
            <p class="text-center mt-3 mb-0">Have an account?</p>
            <a href="{{ route('login') }}" class="btn btn-accent w-100 mt-3">Login here</a>
        </div>
    </div>
</main>

@endsection