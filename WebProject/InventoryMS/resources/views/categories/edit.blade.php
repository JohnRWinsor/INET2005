<!-- /resources/views/categories/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Edit Category</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ url("/categories/{$category->id}") }}">
        @csrf
        @method('PATCH')
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" value="{{ old('category_name', $category->name) }}" required>
        <button type="submit">Update Category</button>
    </form>
@endsection
