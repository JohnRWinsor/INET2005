@extends('layouts.app')

@section('content')
    <h2>Add New Item</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ url('/items') }}" enctype="multipart/form-data">
        @csrf
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <!-- Populate this dropdown with category options -->
        </select>
        <!-- Add other input fields for title, description, price, quantity, SKU, and picture -->
        <button type="submit">Add Item</button>
    </form>
@endsection
