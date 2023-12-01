<!-- /resources/views/categories/index.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Categories</h2>

    <a href="{{ url('/categories/create') }}">Add New Category</a>

    <table>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ url("/categories/{$category->id}/edit") }}">Edit</a>
                        <!-- Add delete button with JavaScript confirmation here -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
