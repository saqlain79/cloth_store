@extends('admin.layouts.app')

@section('content')
<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2 text-light">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-secondary text-light mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-muted-light small text-uppercase">Total Orders</h5>
                    <p class="card-text display-4 fw-bold">{{ $ordersCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-light mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-muted-light small text-uppercase">Total Revenue</h5>
                    <p class="card-text display-4 fw-bold">TK {{ number_format($totalSales, 0) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-light mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-muted-light small text-uppercase">Customers</h5>
                    <p class="card-text display-4 fw-bold">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h4 mt-4 mb-3 text-light">Recent Orders</h2>
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-dark table-striped table-hover mb-0">
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
                @forelse($recentOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @if($order->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status === 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($order->status === 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                        <td>TK {{ number_format($order->total_amount, 0) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No orders placed yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
