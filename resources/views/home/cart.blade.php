@extends('home.app')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <div class="d-flex align-items-center fs-6 pb-4">
        <ion-icon name="home-outline" class="px-1"></ion-icon>
        <a href="{{ route('home') }}" class="text-muted text-decoration-none px-1">Home /</a>
        <p class="mb-0 px-1 text-muted">Shopping Cart</p>
    </div>

    <h1 class="display-6 fw-bold mb-4 text-text">Your Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="background: rgba(16, 185, 129, 0.12); color: #065f46;">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="background: rgba(239, 68, 68, 0.12); color: #991b1b;">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($cartItems->isEmpty())
        <div class="card card-surface border-0 shadow p-5 text-center my-5">
            <div class="mb-4">
                <span class="d-inline-block p-4 rounded-circle" style="background: rgba(99, 102, 241, 0.1);">
                    <svg width="48" height="48" fill="var(--accent)" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L1.01 1.379 1 1H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </span>
            </div>
            <h3 class="fw-bold mb-3">Your cart is empty</h3>
            <p class="text-muted mb-4">You haven't added any gaming gear to your setup yet.</p>
            <div class="d-flex justify-content-center">
                <a href="{{ route('home') }}" class="btn btn-accent btn-lg px-5">Continue Shopping</a>
            </div>
        </div>
    @else
        <div class="row g-4">
            <!-- Cart Items List -->
            <div class="col-lg-8">
                <div class="card card-surface border-0 shadow-sm p-4">
                    <h3 class="fw-bold h5 border-bottom pb-3 mb-4">Cart Items ({{ $cartItems->sum('quantity') }})</h3>

                    @foreach($cartItems as $item)
                        @php
                            $variant = $item->variant;
                            $product = $variant->product;
                            $image = $product->images->first();
                        @endphp
                        <div class="row gy-3 align-items-center pb-4 mb-4 border-bottom @if($loop->last) border-bottom-0 pb-0 mb-0 @endif">
                            <!-- Image -->
                            <div class="col-md-2 col-4">
                                <div class="rounded overflow-hidden shadow-sm" style="background: rgba(15, 23, 42, 0.04);">
                                    @if($image)
                                        <img src="{{ asset('/' . $image->image_url) }}" alt="{{ $product->name }}" class="img-fluid" style="object-fit: cover; height: 80px; width: 80px;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center text-muted" style="height: 80px; width: 80px; font-size: 0.8rem;">
                                            No image
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="col-md-4 col-8">
                                <h4 class="h6 fw-bold mb-1"><a href="{{ route('show_product', $product->id) }}" class="text-decoration-none text-text">{{ $product->name }}</a></h4>
                                <p class="text-muted small mb-2">
                                    Variant: {{ $variant->color ?: 'Default' }}
                                    @if($variant->size) • {{ $variant->size }} @endif
                                </p>
                                <span class="badge badge-soft text-accent">SKU: {{ $variant->sku }}</span>
                            </div>

                            <!-- Quantity Controls -->
                            <div class="col-md-3 col-6">
                                <form action="{{ route('cart.update', ['product_id' => $variant->id]) }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    <label for="qty-{{ $item->id }}" class="visually-hidden">Quantity</label>
                                    <input type="number" name="quantity" id="qty-{{ $item->id }}" class="form-control text-center bg-slate-900 border-0 fw-semibold" style="width: 70px;" value="{{ $item->quantity }}" min="1" max="{{ $variant->stock }}">
                                    <button type="submit" class="btn btn-sm btn-outline-dark" title="Update Quantity">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/></svg>
                                    </button>
                                </form>
                                <span class="text-muted small px-1">Stock: {{ $variant->stock ?? 'N/A' }}</span>
                            </div>

                            <!-- Prices & Delete -->
                            <div class="col-md-3 col-6 text-end">
                                <div class="mb-2">
                                    <span class="d-block fw-bold text-text">TK {{ number_format($variant->price * $item->quantity, 0) }}</span>
                                    <span class="text-muted small">TK {{ number_format($variant->price, 0) }} each</span>
                                </div>
                                <form action="{{ route('cart.remove', ['product_id' => $variant->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm text-danger border-0 p-0 bg-transparent" title="Remove item">
                                        <span class="d-flex align-items-center gap-1 justify-content-end">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                            Remove
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary / Checkout Form -->
            <div class="col-lg-4">
                <div class="card card-surface border-0 shadow-sm p-4 mb-4">
                    <h3 class="fw-bold h5 border-bottom pb-3 mb-4">Order Summary</h3>
                    
                    @php
                        $subtotal = $cartItems->sum(function($item) {
                            return $item->variant->price * $item->quantity;
                        });
                        $shipping = 100; // Flat Shipping Rate in TK
                        $total = $subtotal + $shipping;
                    @endphp

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold text-text">TK {{ number_format($subtotal, 0) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4 pb-2 border-bottom">
                        <span class="text-muted">Shipping Cost</span>
                        <span class="fw-semibold text-text">TK {{ number_format($shipping, 0) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="h6 fw-bold">Total</span>
                        <span class="h5 fw-bold text-accent">TK {{ number_format($total, 0) }}</span>
                    </div>
                </div>

                <!-- Checkout Details -->
                <div class="card card-surface border-0 shadow-sm p-4">
                    <h3 class="fw-bold h5 border-bottom pb-3 mb-4">Shipping Details</h3>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="shipping_address" class="form-label text-muted">Shipping Address <span class="text-danger">*</span></label>
                            <textarea id="shipping_address" name="shipping_address" class="form-control bg-slate-900 border-0 text-text" rows="3" required placeholder="Enter complete address, city, and postal code...">{{ Auth::user()->address }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label text-muted">Payment Method</label>
                            <div class="form-check p-3 rounded border mb-2" style="background: rgba(99, 102, 241, 0.04); border-color: var(--border) !important;">
                                <input class="form-check-input ms-0 me-2" type="radio" name="payment_method" id="cod" value="cod" checked>
                                <label class="form-check-label fw-semibold text-text" for="cod">
                                    Cash on Delivery (COD)
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-accent btn-lg w-100 mt-2">
                            Place Order (TK {{ number_format($total, 0) }})
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection