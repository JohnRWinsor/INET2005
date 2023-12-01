<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>Items</h2>

    <a href="{{ url('/items/create') }}">Add New Item</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SKU</th>
                <th>Picture</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->sku }}</td>
                    <td><img src="{{ asset('storage/'.$item->picture) }}" alt="{{ $item->title }}" width="50"></td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a href="{{ url("/items/{$item->id}/edit") }}">Edit</a>
                        <form method="POST" action="{{ url("/items/{$item->id}") }}" onsubmit="return confirm('Do you really want to delete?');">
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

