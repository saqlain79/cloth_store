@extends('admin.layouts.app')

@section('content')
<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">Products-Variants</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('variants.create') }}" class="btn btn-sm btn-secondary">Add Variant</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($variants as $variants)
                    <tr>
                        <td>{{ $variants->id }}</td>
                        <td>{{ $variants->product_id }}</td>
                        <td>{{ $variants->sku }}</td>
                        <td>{{ $variants->price }}</td>
                        <td>{{ $variants->sale_price }}</td>
                        <td>{{ $variants->color }}</td>
                        <td>{{ $variants->size }}</td>
                        <td>{{ $variants->stock }}</td>
                        <td>
                            <a href="{{ route('variants.edit', $variants->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('variants.destroy', $variants->id) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
</main>
@endsection
