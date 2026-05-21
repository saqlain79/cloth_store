<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Order::sum('total_amount');
        $ordersCount = Order::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $recentOrders = Order::with('user')->latest()->take(10)->get();

        return view('admin.index', compact('totalSales', 'ordersCount', 'totalCustomers', 'recentOrders'));
    }
}
