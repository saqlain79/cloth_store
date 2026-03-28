@extends('home.app')
@section('content')
    <main>
        <h1>Welcome to the Cloth Store</h1>
        <div>
            <div>
                <h2>Categories</h2>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('category_products_list', ['category' => $category->id]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </main
    
@endsection