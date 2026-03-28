@extends('home.app')
@section('content')

<main>
    <h1>Products in {{ $category_products->first()->category_name }}</h1>
    <div class="row">
        @foreach($category_products as $product)
            <div class="col-md-4 mb-4">
                <div class="card w-50">
                    <img src="{{ asset('/' . $product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text mt-auto"><strong>${{ $product->price }}</strong></p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mt-2">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>

@endsection