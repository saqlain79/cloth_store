<?php

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;

test('guest is redirected to login when trying to view the cart', function () {
    $response = $this->get(route('cart.index'));
    $response->assertRedirect(route('login'));
});

test('authenticated customer can view their cart', function () {
    $user = User::factory()->create(['role' => 'customer']);

    $response = $this->actingAs($user)->get(route('cart.index'));

    $response->assertStatus(200);
    $response->assertSee('Your Shopping Cart');
});

test('customer can add a product variant to their cart', function () {
    $user = User::factory()->create(['role' => 'customer']);
    $product = Product::factory()->create();
    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'stock' => 10,
        'price' => 500,
    ]);

    $response = $this->actingAs($user)->post(route('cart.add', ['product_id' => $product->id]), [
        'product_variant_id' => $variant->id,
    ]);

    $response->assertRedirect(route('cart.index'));
    $this->assertDatabaseHas('carts', ['user_id' => $user->id]);
    $this->assertDatabaseHas('cart_items', [
        'product_variant_id' => $variant->id,
        'quantity' => 1,
    ]);
});

test('customer can update cart item quantity', function () {
    $user = User::factory()->create(['role' => 'customer']);
    $product = Product::factory()->create();
    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'stock' => 10,
    ]);

    $cart = Cart::create(['user_id' => $user->id]);
    $cartItem = CartItem::create([
        'cart_id' => $cart->id,
        'product_variant_id' => $variant->id,
        'quantity' => 1,
        'price' => $variant->price,
    ]);

    $response = $this->actingAs($user)->post(route('cart.update', ['product_id' => $variant->id]), [
        'quantity' => 3,
    ]);

    $response->assertRedirect(route('cart.index'));
    $this->assertDatabaseHas('cart_items', [
        'id' => $cartItem->id,
        'quantity' => 3,
    ]);
});

test('customer can remove an item from the cart', function () {
    $user = User::factory()->create(['role' => 'customer']);
    $product = Product::factory()->create();
    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
    ]);

    $cart = Cart::create(['user_id' => $user->id]);
    $cartItem = CartItem::create([
        'cart_id' => $cart->id,
        'product_variant_id' => $variant->id,
        'quantity' => 1,
        'price' => $variant->price,
    ]);

    $response = $this->actingAs($user)->post(route('cart.remove', ['product_id' => $variant->id]));

    $response->assertRedirect(route('cart.index'));
    $this->assertDatabaseMissing('cart_items', [
        'id' => $cartItem->id,
    ]);
});

test('customer can checkout successfully', function () {
    $user = User::factory()->create([
        'role' => 'customer',
        'address' => '123 Tech Street',
    ]);
    $product = Product::factory()->create();
    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'stock' => 10,
        'price' => 1500,
    ]);

    $cart = Cart::create(['user_id' => $user->id]);
    CartItem::create([
        'cart_id' => $cart->id,
        'product_variant_id' => $variant->id,
        'quantity' => 2,
        'price' => $variant->price,
    ]);

    $response = $this->actingAs($user)->post(route('checkout'), [
        'shipping_address' => '456 Gaming Avenue',
    ]);

    $response->assertRedirect(route('home'));

    // Verify order database tables
    $this->assertDatabaseHas('orders', [
        'user_id' => $user->id,
        'shipping_address' => '456 Gaming Avenue',
        'total_amount' => 3100.00, // 2 * 1500 + 100 shipping
        'status' => 'pending',
    ]);

    $order = Order::where('user_id', $user->id)->first();
    $this->assertDatabaseHas('order_items', [
        'order_id' => $order->id,
        'product_variant_id' => $variant->id,
        'quantity' => 2,
        'price' => 1500,
    ]);

    // Verify stock was deducted
    $this->assertEquals(8, $variant->fresh()->stock);

    // Verify cart was cleared
    $this->assertDatabaseMissing('carts', ['user_id' => $user->id]);
    $this->assertDatabaseMissing('cart_items', ['product_variant_id' => $variant->id]);
});
