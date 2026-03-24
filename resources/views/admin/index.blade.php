@extends('admin.layouts.app')

@section('content')
<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">Products</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-secondary text-light mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text display-4">1,234</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-light mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <p class="card-text display-4">$56,789</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-light mb-4">
                <div class="card-body">
                    <h5 class="card-title">New Customers</h5>
                    <p class="card-text display-4">567</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Recent Orders</h2>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#12345</td>
                    <td>John Doe</td>
                    <td>2023-10-01</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>$99.99</td>
                </tr>
                <tr>
                    <td>#12346</td>
                    <td>Jane Smith</td>
                    <td>2023-10-02</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>$149.99</td>
                </tr>
                <tr>
                    <td>#12347</td>
                    <td>Bob Johnson</td>
                    <td>2023-10-03</td>
                    <td><span class="badge bg-info">Shipped</span></td>
                    <td>$79.99</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

@endsection
