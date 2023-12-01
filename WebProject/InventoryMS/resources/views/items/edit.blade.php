<!-- /resources/views/items/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Edit Item</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ url("/items/{$item->id}") }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <!-- Populate this dropdown with category options -->
        </select>
        <!-- Add other input fields for title, description, price, quantity, SKU, and picture -->
        <button type="submit">Update Item</button>
    </form>
@endsection
