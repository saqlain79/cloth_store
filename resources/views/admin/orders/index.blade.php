@extends('admin.layouts.app')

@section('content')
<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">Products</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Brands</th>
                    <th>Is Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->slug }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->brand }}</td>
                        <td>{{ $order->is_active ? 'Yes' : 'No' }}
                        </td>
                        <td>
                            <a href="{{ route('order.edit', $order->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('order.destroy', $order->id) }}"
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
