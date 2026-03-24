@extends('admin.layouts.app')

@section('content')

<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">Products</h1>
    </div>

<form method="POST" action="{{ route('productimages.update', $productimage->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- <input name="product_id" placeholder="Product ID">
    <input name="slug" placeholder="Slug">
    <textarea name="description"></textarea> --}}

    <div class="form-group mb-3">
        <label for="product_id">Product</label>
        <select class="form-control" name="product_id" id="product_id" required>
            <option value="">Select a Product</option>
            @foreach($products as $prod)
                <option value="{{ $prod->id }}" {{ $productimage->product_id == $prod->id ? 'selected' : '' }}>{{ $prod->name }} (ID: {{ $prod->id }}) </option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="image_url">Image File</label>
        <input type="file" class="form-control" name="image_url" id="image_url" accept="image/*">
    </div>
    <div class="form-group mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="is_primary" id="is_primary" value="1" {{ $productimage->is_primary ? 'checked' : '' }}>
            <label class="form-check-label" for="is_primary">Is Primary Image</label>
        </div>
    </div>

    <button type="submit">Save</button>
</form>

</main>

@endsection