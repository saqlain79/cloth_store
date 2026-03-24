@extends('admin.layouts.app')

@section('content')
<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">Product Images</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('productimages.create') }}" class="btn btn-sm btn-primary">Add New</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Image URL</th>
                    <th>Is Primary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productimages as $productimage)
                    <tr class="align-middle">
                        <td>{{ $productimage->id }}</td>
                        <td>{{ $productimage->product->name }}</td>
                        <td>
                            <img src="{{ asset($productimage->image_url) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>{{ $productimage->image_url }}</td>
                        <td>{{ $productimage->is_primary ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('productimages.edit', $productimage->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('productimages.destroy', $productimage->id) }}"
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
