@extends('admin.layouts.app')

@section('content')

<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">New Variants</h1>
    </div>

<form method="POST" action="{{ route('variants.update', $variant->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Product ID</label>
        <select class="form-control" name="product_id" id="product_id" required>
            <option value="">Select a Product</option>
            @foreach($products as $prod)
                <option {{ $variant->product_id == $prod->id ? 'selected' : '' }} value="{{ $prod->id }}">{{ $prod->name }} (ID: {{ $prod->id }})</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sku">SKU</label>
        <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" value="{{ $variant->sku }}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="10" class="form-control" name="price" id="price" placeholder="Price" value="{{ $variant->price }}" required>
    </div>
    <div class="form-group">
        <label for="sale_price">Sale Price</label>
        <input type="number" step="10" class="form-control" name="sale_price" id="sale_price" placeholder="Sale Price" value="{{ $variant->sale_price }}">
    </div>
    <div class="form-group">
        <label for="color">Color</label>
        <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="{{ $variant->color }}">
    </div>
    <div class="form-group">
        <label for="size">Size</label>
        <input type="text" class="form-control" name="size" id="size" placeholder="Size" value="{{ $variant->size }}">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock" value="{{ $variant->stock }}" required>
    </div>

    {{-- <h3>Variants</h3>
    <input name="variants[0][sku]" placeholder="SKU">
    <input name="variants[0][price]" placeholder="Price">
    <input name="variants[0][stock]" placeholder="Stock"> --}}

    <button type="submit">Save</button>
</form>

</main>

@endsection