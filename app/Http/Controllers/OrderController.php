<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.variant.product')->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_address' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (! $cart) {
            return redirect()->route('home')->with('error', 'Your shopping cart is empty.');
        }

        $cartItems = CartItem::where('cart_id', $cart->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Your shopping cart is empty.');
        }

        // Calculate total amount
        $subtotal = $cartItems->sum(function ($item) {
            return $item->variant->price * $item->quantity;
        });
        $shipping = 100; // Flat Shipping Rate in TK
        $totalAmount = $subtotal + $shipping;

        try {
            DB::transaction(function () use ($user, $cart, $cartItems, $totalAmount, $request) {
                // 1. Create the Order
                $order = Order::create([
                    'user_id' => $user->id,
                    'total_amount' => $totalAmount,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                    'shipping_address' => $request->shipping_address,
                ]);

                // 2. Process each cart item
                foreach ($cartItems as $item) {
                    $variant = ProductVariant::findOrFail($item->product_variant_id);

                    // Check if stock is available
                    if ($variant->stock < $item->quantity) {
                        throw new \Exception("Insufficient stock for variant: {$variant->sku}");
                    }

                    // Create OrderItem
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_variant_id' => $variant->id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'total' => $item->price * $item->quantity,
                    ]);

                    // Deduct stock from variant
                    $variant->decrement('stock', $item->quantity);
                }

                // 3. Clear the Cart
                CartItem::where('cart_id', $cart->id)->delete();
                $cart->delete();
            });

            return redirect()->route('home')->with('success', 'Order placed successfully! Thank you for shopping with us.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to place order: '.$e->getMessage());
        }
    }

    public function create() {}

    public function store() {}

    public function edit() {}

    public function update(Request $request, $id)
    {
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
