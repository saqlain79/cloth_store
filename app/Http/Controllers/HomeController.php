<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
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

    public function category_products_list(Category $category)
    {
        // first step: join products, product_images, and product_variants
        // $productItems = DB::table('products as p')
        //     ->join('product_images as pi', 'p.id', '=', 'pi.product_id')
        //     ->join('product_variants as pv', 'p.id', '=', 'pv.product_id')
        //     ->select(
        //         'p.id as product_id',
        //         'p.name',
        //         'p.description',
        //         'p.brand',
        //         'pi.image_url',
        //         'pv.sku',
        //         'pv.price',
        //         'pv.size',
        //         'pv.color'
        //     );
        
        // // second step: join categories and category_products
        // $categoryItems = DB::table('categories as c')
        //     ->join('category_products as cp', 'c.id', '=', 'cp.category_id')
        //     ->select(
        //         'cp.product_id',
        //         'c.id as category_id',
        //         'c.name as category_name'
        //     );

        // // third step: join the two temporary tables
        // $category_products = DB::query()
        //     ->fromSub($productItems, 'product_items')
        //     ->joinSub($categoryItems, 'category_items', function ($join) {
        //         $join->on('product_items.product_id', '=', 'category_items.product_id');
        //     })
        //     ->where('category_items.category_id', $category->id)
        //     ->select(
        //         'product_items.product_id as id',
        //         'product_items.name',
        //         'product_items.description',
        //         'product_items.brand',
        //         'product_items.image_url',
        //         'product_items.sku',
        //         'product_items.price',
        //         'product_items.size',
        //         'product_items.color',
        //         'category_items.category_name'
        //     )
        //     ->get()
        //     ->unique('product_id')
        //     ->values();

        // return view('home.category_products', compact('category_products', 'category'));
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
        $product = Product::with(['variants', 'images'])->findOrFail($id);

        return view('home.show', compact('product'));
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
