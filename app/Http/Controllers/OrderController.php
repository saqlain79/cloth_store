<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return back();
    }
}
