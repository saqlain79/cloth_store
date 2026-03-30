@extends('home.app')
@section('content')
    <section class="hero-gradient rounded-4 p-5 mb-5">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <span class="badge badge-soft px-3 py-2 mb-3">Premium PC peripherals</span>
                <h1 class="display-5 fw-bold">Build the ultimate setup for gaming, streaming, and productivity.</h1>
                <p class="lead text-muted mt-3">Shop premium keyboards, mice, headsets, desks, and accessories with a modern storefront built for tech enthusiasts.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#categories" class="btn btn-accent btn-lg px-5">Browse Categories</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg px-5">See new arrivals</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-surface border-0 shadow-lg">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <span class="d-inline-block p-3 rounded-circle" style="background: rgba(34, 211, 238, 0.12);">
                                <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16"><path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0Zm2.85 11.2-4.92 2.9a.5.5 0 0 1-.72-.55l1.18-4.86L2.3 6.4a.5.5 0 0 1 .27-.96l5.23-.22 2.22-4.5a.5.5 0 0 1 .91 0l2.22 4.5 5.23.22a.5.5 0 0 1 .27.96l-3.99 1.76 1.18 4.86a.5.5 0 0 1-.72.55l-4.92-2.9Z"/></svg>
                            </span>
                        </div>
                        <h4 class="card-title mb-3">Designed for high-performance setups</h4>
                        <p class="text-text mb-4">A curated storefront for PC peripherals with clean navigation, category discovery, and fast product browsing.</p>
                        <div class="row text-start">
                            <div class="col-6 mb-3">
                                <strong>Wireless gear</strong>
                            </div>
                            <div class="col-6 mb-3">
                                <strong>RGB controllers</strong>
                            </div>
                            <div class="col-6 mb-3">
                                <strong>Ergonomic accessories</strong>
                            </div>
                            <div class="col-6 mb-3">
                                <strong>Fast shipping</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="categories" class="mb-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <p class="text-uppercase text-muted mb-1">Discover</p>
                <h2 class="fw-bold text-muted">Featured Category</h2>
            </div>
            <p class="footer-note mb-0">Click a category to explore tailored peripherals.</p>
        </div>

        <div class="row gy-4">
            @foreach($categories as $category)
                <div class="col-sm-6 col-lg-2">
                    <a href="{{ route('category_products_list', ['category' => $category->id]) }}" class="text-decoration-none">
                        <div class="card card-surface h-100 shadow px-3 py-4 border-0">
                            <div class="mb-3">
                                <span class="badge-soft px-3 py-2 rounded-pill">{{ strtoupper(substr($category->name, 0, 2)) }}</span>
                            </div>
                            <h3 class="h5 text-white">{{ $category->name }}</h3>
                            <p class="text-text">Browse the latest {{ strtolower($category->name) }} and accessories.</p>
                            <span class="text-accent">Explore →</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section id="features" class="pb-5">
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="card card-surface h-100 p-4 border-0 shadow-sm">
                    <h5 class="mb-3">Fast support</h5>
                    <p class="text-muted">Expert help for product questions, compatibility, and checkout guidance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-surface h-100 p-4 border-0 shadow-sm">
                    <h5 class="mb-3">Secure checkout</h5>
                    <p class="text-muted">Keep your payment information safe with a clean and modern online experience.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-surface h-100 p-4 border-0 shadow-sm">
                    <h5 class="mb-3">Smart browsing</h5>
                    <p class="text-muted">Designed for easy discovery of keyboards, mice, headsets, and custom rigs.</p>
                </div>
            </div>
        </div>
    </section>
@endsection