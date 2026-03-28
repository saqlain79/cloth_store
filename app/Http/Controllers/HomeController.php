<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function category_products_list()
    {
        // shows all the products of a category
        $category_products = DB::table('category_products')
            ->join('products', 'category_products.product_id', '=', 'products.id')
            ->join('categories', 'category_products.category_id', '=', 'categories.id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->select('products.*', 'categories.name as category_name', 'product_images.*', 'product_variants.*')
            ->get();

            return view('home.category_products', compact('category_products'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
