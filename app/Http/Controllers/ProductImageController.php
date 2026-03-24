<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Product;

class ProductImageController extends Controller
{
    public function index() 
    {
        $productimages = ProductImage::with('product')->latest()->get();
        return view('admin.product_images.index', compact('productimages'));
    }
    public function create()
    {
        $products = Product::all();
        return view('admin.product_images.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Handle file upload and save image details to the database
        // Validate the request, store the image, and associate it with the product

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_url' => 'required|image|max:2048',
            'is_primary' => 'required|boolean',
        ]);

        // Store the image and save details to the database
        // $path = $request->file('image_url')->store('product_images', 'public');
        // ProductImage::create([
        //     'product_id' => $request->product_id,
        //     'image_url' => $path,
        //     'is_primary' => $request->is_primary,
        // ]);
        $productimage = new ProductImage();
        $image = $request->file('image_url');
        $imagename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('product_images'), $imagename);
        $productimage->product_id = $request->product_id;
        $productimage->image_url = 'product_images/' . $imagename;
        $productimage->is_primary = $request->is_primary;
        $productimage->save();
        return redirect()->route('productimages.index');
    }

    public function edit($id)
    {
        $products = Product::all();
        $productimage = ProductImage::findOrFail($id);
        return view('admin.product_images.edit', compact('productimage', 'products'));
    }

    public function update(Request $request, $id)
    {
        $productimage = ProductImage::findOrFail($id);
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_url' => 'nullable|image|max:2048',
            'is_primary' => 'required|boolean',
        ]);

        $image = $request->file('image_url');
        if ($image) 
            {
                $imagename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imagename);
                $productimage->image_url = 'product_images/' . $imagename;
            }
        $productimage->product_id = $request->product_id;
        $productimage->is_primary = $request->is_primary;
        $productimage->save();

        return redirect()->route('productimages.index');
    }

    public function destroy($id)
    {
        $productimage = ProductImage::findOrFail($id);
        // Optionally, delete the image file from storage
        $productimage->delete();
        return back();
    }
}
