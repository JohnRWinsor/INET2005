<!-- resources/views/items/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Edit Item</h2>

    <form method="post" action="{{ url("/items/{$item->id}") }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- Add input fields for each item attribute -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $item->title }}">

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $item->description }}</textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ $item->price }}">

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="{{ $item->quantity }}">

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" value="{{ $item->sku }}">

        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture">

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Update Item</button>
    </form>
@endsection