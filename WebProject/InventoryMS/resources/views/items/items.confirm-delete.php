<!-- resources/views/items/confirm-delete.blade.php -->
@extends('layouts.app')

@section('content')
    <div>
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete the item with ID: {{ $item->id }} - {{ $item->title }}?</p>

        <form method="POST" action="{{ url('/items/' . $item->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit">Delete</button>
        </form>
    </div>
@endsection