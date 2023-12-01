<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();


        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'category_id' => 'required|exists:categories,id',
        // validate other input
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

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }

    
}
