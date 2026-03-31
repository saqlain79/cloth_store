@extends('home.app')
@section('content')
    <section class="py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
            <div>
                <p class="text-uppercase text-muted mb-1">Category</p>
                <h1 class="fw-bold">{{ $category->name }}</h1>
                <p class="text-muted">Shop the latest peripherals in this category, with curated selections for your desktop or gaming setup.</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-outline-light">Back to homepage</a>
        </div>

        <div class="row g-4">
            @foreach($category_products as $product)
                @php
                    $image = $product->images->first();
                    $variant = $product->variants->first();
                @endphp
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-surface h-100 shadow-sm border-0 overflow-hidden">
                        @if($image)
                            <img src="{{ asset('/' . $image->image_url) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 240px;">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:240px; background: rgba(99, 102, 241, 0.08);">
                                <span class="text-muted">No image available</span>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <span class="badge-soft mb-2">{{ $variant->color ?? 'Multi' }}</span>
                            <h5 class="card-title mb-2">{{ $product->name }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit($product->description, 90) }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">TK {{ number_format($variant->price ?? 0, 0) }}</span>
                                <span class="text-muted small">SKU {{ $variant->sku ?? 'N/A' }}</span>
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
@endsection