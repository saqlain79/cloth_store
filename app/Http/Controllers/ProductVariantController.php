<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\Product;

class ProductVariantController extends Controller
{
    public function index() {
        $variants = ProductVariant::with('product')->latest()->get();
        return view('admin.variants.index', compact('variants'));
    }

    public function create()
    {
        $products = Product::all();
        $variants = ProductVariant::all();
        return view('admin.variants.create', compact('products', 'variants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'sku' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer', 
        ]);

        $variant = ProductVariant::create($request->all([
            'product_id',
            'price',
            'sale_price',
            'color',
            'size',
            'stock',
        ]));
        $variant->sku = 'SKU-'.$variant->id.'-'.now()->timestamp;
        $variant->save();
        return redirect()->route('variants.index');
    }

    public function edit($id)
    {
        $products = Product::all();
        $variant = ProductVariant::findOrFail($id);
        return view('admin.variants.edit', compact('variant', 'products'));
    }

    public function update(Request $request, $id)
    {
        $variant = ProductVariant::findOrFail($id);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'sku' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer', 
        ]);

        $variant->update($request->all());
        return redirect()->route('variants.index');
    }

    public function destroy($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();
        return redirect()->route('variants.index');
    }
}
