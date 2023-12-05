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
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('items.edit', $item->id) }}">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
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