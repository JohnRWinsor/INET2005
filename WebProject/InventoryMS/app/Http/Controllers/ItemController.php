<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'SKU' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'picture' => 'required',
        ]);
    
        Item::create($request->all());
    
        return redirect('/items')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            // validate other input
        ]);
    
        $item->update($request->all());
    
        return redirect('/items')->with('success', 'Item updated successfully.');
    }
}