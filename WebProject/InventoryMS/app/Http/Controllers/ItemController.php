<?php

// app/Http/Controllers/ItemController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Storage;



class ItemController extends Controller
{
    public function create()
    {
        // Assuming you have a Category model to fetch categories
        $categories = Category::all(); // Adjust as needed
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|unique:items',
            'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);
    
        // Upload image to the server if it exists
        $picturePath = $request->hasFile('picture') ? $request->file('picture')->store('images', 'public') : null;
    
        // Create new item
        $item = Item::create([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
            'picture' => $picturePath,
        ]);
    
        return redirect('/items');
    }

    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all(); // Assuming you have a Category model
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|unique:items,sku,' . $id,
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);
    
        $item = Item::findOrFail($id);
    
        if ($request->hasFile('picture')) {
            // Upload new image to the server
            $picturePath = $request->file('picture')->store('images', 'public');
            // Delete old image
            Storage::disk('public')->delete($item->picture);
        } else {
            $picturePath = $item->picture;
        }
    
        // Update item
        $item->update([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
            'picture' => $picturePath,
        ]);
    
        return redirect('/items');
    }
    

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        // Soft delete the item
        $item->delete();
        // Delete the image from the server
        Storage::disk('public')->delete($item->picture);
    
        return redirect('/items');
    }

    // Add a new method for the confirmation view
    public function confirmDelete($id)
    {
        $item = Item::findOrFail($id);
        return view('items.confirm-delete', compact('item'));
    }
}