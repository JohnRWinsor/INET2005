@extends('layouts.app')

@section('content')
    <h2>Add New Category</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ url('/categories') }}">
        @csrf
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" value="{{ old('category_name') }}" required>
        <button type="submit">Add Category</button>
    </form>
@endsection