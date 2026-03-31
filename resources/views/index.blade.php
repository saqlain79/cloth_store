@extends('home.app')
@section('content')
    <section class="hero-gradient rounded-4 p-5 mb-5 shadow">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <span class="badge badge-soft px-3 py-2 mb-3">Premium PC peripherals</span>
                <h1 class="display-5 fw-bold">Build the ultimate setup for gaming, streaming, and productivity.</h1>
                <p class="lead text-muted mt-3">Shop premium keyboards, mice, headsets, desks, and accessories with a modern storefront built for tech enthusiasts.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#categories" class="btn btn-accent btn-lg px-5">Browse Categories</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg px-5 text-text">See new arrivals</a>
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

    <section id="new-arrivals">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <p class="text-uppercase text-muted mb-1">New arrivals</p>
                <h2 class="fw-bold text-muted">Latest Products</h2>
            </div>
            <a href="{{ route('home') }}" class="btn btn-outline-dark">See all products</a>
        </div>

        <div class="row gy-4 pb-5">
            @foreach($new_arrivals as $product)
                @php
                    $image = $product->images->first();
                    $variant = $product->variants->first();
                @endphp
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-surface h-100 shadow border-0 overflow-hidden">
                        @if($image)
                            <img src="{{ asset('/' . $image->image_url) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 200px;">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:200px; background: rgba(15, 23, 42, 0.04);">
                                <span class="text-muted">No image available</span>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <span class="badge-soft mb-2">{{ $variant->color ?? 'Multi' }}</span>
                            <h5 class="card-title mb-2">{{ $product->name }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">TK {{ number_format($variant->price ?? 0, 0) }}</span>
                                <span class="text-muted small">SKU: {{ $variant->sku ?? 'N/A' }}</span>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('show_product', $product->id) }}" class="btn btn-accent w-100">View product</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="features" class="pb-5">
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="card card-surface h-100 p-4 border-0 shadow">
                    <h5 class="mb-3">Fast support</h5>
                    <p class="text-muted">Expert help for product questions, compatibility, and checkout guidance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-surface h-100 p-4 border-0 shadow">
                    <h5 class="mb-3">Secure checkout</h5>
                    <p class="text-muted">Keep your payment information safe with a clean and modern online experience.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-surface h-100 p-4 border-0 shadow">
                    <h5 class="mb-3">Smart browsing</h5>
                    <p class="text-muted">Designed for easy discovery of keyboards, mice, headsets, and custom rigs.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="extras">
        <div>
            <div class="col-lg-12 col-sm-6 align-items-center">
                <div class="card card-surface border-0 shadow-lg p-4 mb-4">
                    <h5>Bangladesh’s Trusted Gaming Accessories Store</h5>
                    <p class="text-muted">Tech Store is a premier destination for gamers across Bangladesh. We specialize in high-performance gaming keyboards, mice, controllers, monitors, and accessories from internationally recognized brands. Our goal is to bring premium gaming gear at competitive prices with reliable after-sales support.</p>
                </div>
                <div class="card card-surface border-0 shadow-lg p-4 mb-4">
                    <h5>Wide Range of Gaming Products</h5>
                    <p class="text-muted">Explore our extensive collection of gaming accessories and peripherals designed for the ultimate gaming experience.</p>
                </div>
                <div class="card card-surface border-0 shadow-lg p-4 mb-4">
                    <h5>Nationwide Delivery & Fast Service</h5>
                    <p class="text-muted">We provide fast and reliable delivery services across Bangladesh, ensuring your gaming accessories reach you in time.</p>
                </div>
            </div>
        </div>
    </section>
@endsection