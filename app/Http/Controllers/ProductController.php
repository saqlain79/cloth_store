<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('variants')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'description' => 'nullable',
            'brand' => 'nullable',
            'is_active' => 'required|boolean',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $id,
            'description' => 'nullable',
            'brand' => 'nullable',
            'is_active' => 'required|boolean',
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id) {
        Product::destroy($id);
        return back();
    }

}
