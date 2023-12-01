<!-- /resources/views/items/index.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Items</h2>

    <a href="{{ url('/items/create') }}">Add New Item</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ url("/items/{$item->id}/edit") }}">Edit</a>
                        <!-- Add delete button with JavaScript confirmation here -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
