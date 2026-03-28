<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('items')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id) {
        $order = Order::with('items.variant.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function create(){}

    public function store(){}

    public function edit()
    {
        
    }

    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return back();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back();
    }
}
