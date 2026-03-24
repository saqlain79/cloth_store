<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return view('admin.categories.index', compact('category'));
    }

    public function create() {
        $category = Category::all();
        return view('admin.categories.create', compact('category'));
    }

    public function store(Request $request) {
        // Validate and save the new category
         $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
         ]);
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id) {
        // Validate and update the category
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id) {
        // Delete the category
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
