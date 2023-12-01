<!-- resources/views/items/create.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Add New Item</h2>

    <form method="post" action="{{ url('/items') }}" enctype="multipart/form-data">
        @csrf
        <!-- Add input fields for each item attribute -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price">

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity">

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku">

        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture">

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add Item</button>
    </form>
@endsection