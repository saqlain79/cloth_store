@extends('home.app')
@section('content')
    <section class="py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="card card-surface border-0 shadow-lg overflow-hidden">
                    @if($product->images->isNotEmpty())
                        <img src="{{ asset('/' . $product->images->first()->image_url) }}" class="img-fluid" alt="{{ $product->name }}" style="object-fit: cover; width: 100%; height: 520px;">
                    @else
                        <div class="d-flex align-items-center justify-content-center" style="height:520px; background: rgba(148, 163, 184, 0.08);">
                            <span class="text-muted">Product image unavailable</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-4">
                    <span class="badge-soft px-3 py-2">{{ $product->brand ?: 'Tech Gear' }}</span>
                    <h1 class="fw-bold mt-3">{{ $product->name }}</h1>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>

                @php
                    $selectedVariant = $product->variants->first();
                @endphp

                @if($selectedVariant)
                    <div class="mb-4">
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            <span class="product-pill px-3 py-2 rounded-pill">Price: TK {{ number_format($selectedVariant->price, 0) }}</span>
                            <span class="product-pill px-3 py-2 rounded-pill">SKU: {{ $selectedVariant->sku }}</span>
                            <span class="product-pill px-3 py-2 rounded-pill">Stock: {{ $selectedVariant->stock ?? 'N/A' }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="variant_id" class="form-label text-muted">Choose variant</label>
                            <select id="variant_id" name="variant_id" class="form-select bg-slate-900 text-white border-0">
                                @foreach($product->variants as $variant)
                                    <option value="{{ $variant->id }}">
                                        {{ $variant->color ?: 'Default' }}@if($variant->size) • {{ $variant->size }}@endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <div class="alert alert-secondary">No variants are available for this product.</div>
                @endif

                <div class="d-flex flex-wrap gap-3">
                    <a href="#" class="btn btn-accent btn-lg px-5">Add to cart</a>
                    <a href="#" class="btn btn-outline-light btn-lg px-5">Buy now</a>
                </div>

                <div class="mt-5 p-4 card card-surface border-0 shadow-sm">
                    <h5 class="mb-3">Why this setup works</h5>
                    <ul class="list-unstyled mb-0 text-muted">
                        <li class="mb-2">• Precision-crafted peripherals for speed and control.</li>
                        <li class="mb-2">• Premium materials tuned for long sessions.</li>
                        <li class="mb-2">• Designed to fit the modern desk and RGB rig.</li>
                    </ul>
                </div>

                <a href="{{ route('home') }}" class="btn btn-link text-muted mt-4">Back to store</a>
            </div>
        </div>
    </section>
@endsection