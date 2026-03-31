@extends('home.app')
@section('content')
    <section class="py-2">
        <div class="d-flex align-items-center fs-6 pb-4">
            <ion-icon name="home-outline" size="small px-1"></ion-icon>
            <a href="{{ route('home') }}" class="text-muted text-decoration-none px-1">Home /</a>
            <p class="mb-0 px-1 text-muted">{{ $product->name }}</p>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="card card-surface border-0 shadow-lg overflow-hidden" style="max-height: 600px; max-width: 600px; margin: auto;">
                    @if($product->images->isNotEmpty())
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($product->images as $index => $image)
                                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($product->images as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('/' . $image->image_url) }}" class="img-fluid" alt="{{ $product->name }} image {{ $index + 1 }}" style="object-fit: fill; height: 600px; width: 600px;">
                                    </div>
                                @endforeach
                            </div>
                            @if($product->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
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
                    <a href="#" class="btn btn-outline-dark btn-lg px-5">Buy now</a>
                </div>

                <div class="mt-5 p-4 card card-surface border-0 shadow-sm">
                    <h5 class="mb-3">Description</h5>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection