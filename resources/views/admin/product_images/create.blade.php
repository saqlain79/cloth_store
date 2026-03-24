@extends('admin.layouts.app')

@section('content')

<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">New Products</h1>
    </div>

<form method="POST" action="{{ route('productimages.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="product_id">Product</label>
        <select class="form-control" name="product_id" id="product_id" required>
            <option value="">Select a Product</option>
            @foreach($products as $prod)
                <option value="{{ $prod->id }}">{{ $prod->name }} (ID: {{ $prod->id }})</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="image_url">Image File</label>
        <input type="file" class="form-control" name="image_url" id="image_url" accept="image/*" required>
    </div>
    <div class="form-group mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="is_primary" id="is_primary" value="1">
            <label class="form-check-label" for="is_primary">Is Primary Image</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Product Image</button>
</form>

</main>

@endsection