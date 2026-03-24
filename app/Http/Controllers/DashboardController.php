<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalSales = \App\Models\Order::where('payment_status','paid')->sum('total_amount');
        $orders = \App\Models\Order::count();

        return view('admin.index', compact('totalSales','orders'));
    }
}
