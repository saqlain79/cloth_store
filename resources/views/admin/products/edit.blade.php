@extends('admin.layouts.app')

@section('content')

<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">Products</h1>
    </div>

<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" id="slug" value="{{ $product->slug }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" name="brand" id="brand" value="{{ $product->brand }}">
    </div>
    <div class="form-group">
        <label for="is_active">Is Active</label>
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}>
    </div>

    {{-- <h3>Variants</h3>
    <input name="variants[0][sku]" placeholder="SKU">
    <input name="variants[0][price]" placeholder="Price">
    <input name="variants[0][stock]" placeholder="Stock"> --}}

    <button type="submit">Save</button>
</form>

</main>

@endsection