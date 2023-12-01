<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Categories</h2>

    <a href="{{ route('categories.create') }}">Add New Category</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}" onsubmit="return confirm('Do you really want to delete?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
