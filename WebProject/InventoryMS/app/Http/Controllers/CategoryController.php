<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

public function index()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required|unique:categories,name,' . $id,
    ]);

    $category = Category::findOrFail($id);
    $category->update([
        'name' => $request->input('category_name'),
    ]);

    return redirect('/categories')->with('success', 'Category updated successfully.');
}

public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $request->validate([
        'category_name' => 'required|unique:categories,name',
    ]);

    Category::create([
        'name' => $request->input('category_name'),
    ]);

    return redirect('/categories')->with('success', 'Category created successfully.');
}
}
