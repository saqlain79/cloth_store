<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function add(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'product_variant_id' => ['required', 'integer', 'exists:product_variants,id'],
        ]);

        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $variant = ProductVariant::findOrFail($validated['product_variant_id']);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_variant_id', $variant->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_variant_id' => $variant->id,
                'quantity' => 1,
                'price' => $variant->price,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
